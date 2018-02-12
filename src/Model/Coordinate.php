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

    /**
     * Returns new coordination for orientation
     *
     * @param Orientation $orientation
     * @return Coordinate
     */
    public function newCoordinateForOrientation(Orientation $orientation): Coordinate
    {
        return new Coordinate($this->x + $orientation->getStepSizeX(), $this->y + $orientation->getStepSizeY());
    }

    /**
     * Checks coordinate in bounds
     * @param Coordinate $coordinate
     * @return bool
     */
    public function hasWithinBounds(Coordinate $coordinate): bool
    {
        return $this->isXCoordinateWithinBounds($coordinate->getX()) && $this->isYCoordinateWithinBounds($coordinate->getY());
    }

    /**
     * Checks coordinate has outside of bounds
     * @param Coordinate $coordinate
     * @return bool
     */
    public function hasOutsideBounds(Coordinate $coordinate): bool
    {
        return $this->isXCoordinateInOutsideBounds($coordinate->getX()) && $this->isYCoordinateInOutsideBounds($coordinate->getY());
    }

    private function isYCoordinateWithinBounds(int $yCoordinate): bool
    {
        return $yCoordinate <= $this->y;
    }

    private function isXCoordinateWithinBounds(int $xCoordinate): bool
    {
        return $xCoordinate <= $this->x;
    }

    private function isYCoordinateInOutsideBounds(int $yCoordinate): bool
    {
        return $yCoordinate >= $this->y;
    }

    private function isXCoordinateInOutsideBounds(int $xCoordinate): bool
    {
        return $xCoordinate >= $this->x;
    }

}