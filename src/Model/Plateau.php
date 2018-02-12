<?php

namespace Osman\MarsRoverChallenge\Model;


final class Plateau
{

    /**
     * @var Coordinate
     */
    private $topRightCoordinate;

    /**
     * @var
     */
    private $bottomLeftCoordinate;

    /**
     * Plateau constructor.
     * @param Coordinate $topRightCoordinate
     */
    public function __construct(Coordinate $topRightCoordinate)
    {
        $this->topRightCoordinate = $topRightCoordinate;
        $this->bottomLeftCoordinate = new Coordinate(0, 0);
    }

    /**
     * Checks bounds
     *
     * @param Coordinate $coordinate
     * @return bool
     */
    public function hasWithinBounds(Coordinate $coordinate): bool
    {
        return $this->bottomLeftCoordinate->hasOutsideBounds($coordinate) && $this->topRightCoordinate->hasWithinBounds(
                $coordinate
            );
    }

}