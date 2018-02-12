<?php


namespace Osman\MarsRoverChallenge\Model\Orientation;


final class East implements Orientation
{
    public function turnLeft(): Orientation
    {
        return new North();
    }

    public function turnRight(): Orientation
    {
        return new South();
    }

    public function getStepSizeX(): int
    {
        return 1;
    }

    public function getStepSizeY(): int
    {
        return 0;
    }

    public function getShortName(): string
    {
        return 'E';
    }


}