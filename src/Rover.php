<?php

namespace Osman\MarsRoverChallenge;


use Osman\MarsRoverChallenge\Command\Command;
use Osman\MarsRoverChallenge\Model\Coordinate;
use Osman\MarsRoverChallenge\Model\Orientation\Orientation;
use Osman\MarsRoverChallenge\Model\Plateau;

final class Rover
{

    /**
     * @var Coordinate
     */
    private $coordinate;

    /**
     * @var Orientation
     */
    private $orientation;

    /**
     * @var Plateau
     */
    private $plateau;

    /**
     * Rover constructor.
     * @param Coordinate $coordinate
     * @param Orientation $orientation
     * @param Plateau $plateau
     */
    public function __construct(Coordinate $coordinate, Orientation $orientation, Plateau $plateau)
    {
        $this->coordinate = $coordinate;
        $this->orientation = $orientation;
        $this->plateau = $plateau;
    }

    /**
     * Runs rover based on string command
     * @param $commands
     * @throws \OutOfBoundsException
     * @throws \UnexpectedValueException
     */
    public function run($commands)
    {
        $commandParser = new CommandParser();
        /**
         * @var $command Command
         */
        foreach ($commandParser->stringToCommands($commands) as $command) {
            $command->execute($this);
        }
    }

    /**
     * Changes orientation
     */
    public function turnLeft(): void
    {
        $this->orientation = $this->orientation->turnLeft();
    }

    /**
     * Changes orientation
     */
    public function turnRight(): void
    {
        $this->orientation = $this->orientation->turnRight();
    }

    /**
     * Moves rover
     * @throws \OutOfBoundsException
     */
    public function move(): void
    {
        $newCoordinate = $this->coordinate->newCoordinateForOrientation($this->orientation);
        if (!$this->plateau->hasWithinBounds($newCoordinate)) {
            throw new \OutOfBoundsException('New coordinate is outside of plateau');
        }

        $this->coordinate = $newCoordinate;
    }

    /**
     * Returns current position
     * @return string
     */
    public function getCurrentPosition(): string
    {
        return sprintf(
            '%d %d %s',
            $this->coordinate->getX(),
            $this->coordinate->getY(),
            $this->orientation->getShortName()
        );
    }

}