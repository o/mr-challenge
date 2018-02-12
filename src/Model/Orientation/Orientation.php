<?php

namespace Osman\MarsRoverChallenge\Model\Orientation;


interface Orientation
{

    /**
     * Returns new orientation
     * @return Orientation
     */
    public function turnLeft(): Orientation;

    /**
     * Returns new orientation
     * @return Orientation
     */
    public function turnRight(): Orientation;

    /**
     * Returns step size for X
     * @return int
     */
    public function getStepSizeX(): int;

    /**
     * Returns step size for Y
     * @return int
     */
    public function getStepSizeY(): int;

    /**
     * Returns short name
     * @return string
     */
    public function getShortName(): string;

}