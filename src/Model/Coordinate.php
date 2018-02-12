<?php

namespace Osman\MarsRoverChallenge\Model;

use Osman\MarsRoverChallenge\Model\Orientation\Orientation;

final class Coordinate
{

    /**
     * @var integer
     */
    private $x;

    /**
     * @var integer
     */
    private $y;

    /**
     * Coordinate constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    public function newCoordinateForOrientation(Orientation $orientation): Coordinate
    {
        return new Coordinate($this->x + $orientation->getStepSizeX(), $this->y + $orientation->getStepSizeY());
    }

    public function hasWithinBounds(Coordinate $coordinate): boolean
    {
        return $this->isXCoordinateWithinBounds($coordinate->getX()) && $this->isYCoordinateWithinBounds($coordinate->getY());
    }

    private function isYCoordinateWithinBounds(int $yCoordinate): boolean
    {
        return $yCoordinate <= $this->y;
    }

    private function isXCoordinateWithinBounds(int $xCoordinate): boolean
    {
        return $xCoordinate <= $this->x;
    }

}