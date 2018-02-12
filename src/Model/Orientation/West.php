<?php


namespace Osman\MarsRoverChallenge\Model\Orientation;


final class West implements Orientation
{
    public function turnLeft(): Orientation
    {
        return new South();
    }

    public function turnRight(): Orientation
    {
        return new North();
    }

    public function getStepSizeX(): int
    {
        return -1;
    }

    public function getStepSizeY(): int
    {
        return 0;
    }

    public function getShortName(): string
    {
        return 'W';
    }


}