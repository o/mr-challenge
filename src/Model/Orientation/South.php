<?php

namespace Osman\MarsRoverChallenge\Model\Orientation;

final class South implements Orientation
{
    public function turnLeft(): Orientation
    {
        return new East();
    }

    public function turnRight(): Orientation
    {
        return new West();
    }

    public function getStepSizeX(): int
    {
        return 0;
    }

    public function getStepSizeY(): int
    {
        return -1;
    }

    public function getShortName(): string
    {
        return 'S';
    }


}