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
     * @param Coordinate  $coordinate
     * @param Orientation $orientation
     * @param Plateau     $plateau
     */
    public function __construct(Coordinate $coordinate, Orientation $orientation, Plateau $plateau)
    {
        $this->coordinate = $coordinate;
        $this->orientation = $orientation;
        $this->plateau = $plateau;
    }

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

    public function turnLeft(): void
    {
        $this->orientation = $this->orientation->turnLeft();
    }

    public function turnRight(): void
    {
        $this->orientation = $this->orientation->turnRight();
    }

    public function move(): void
    {
        $this->coordinate = $this->coordinate->newCoordinateForOrientation($this->orientation);
    }

    public function getCurrentPosition() {
        return sprintf('%d %d %s', $this->coordinate->getX(), $this->coordinate->getY(), $this->orientation->getShortName());
    }

}