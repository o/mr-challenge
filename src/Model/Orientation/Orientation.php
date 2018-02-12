<?php

namespace Osman\MarsRoverChallenge\Model\Orientation;


interface Orientation
{

    public function turnLeft(): Orientation;

    public function turnRight(): Orientation;

    public function getStepSizeX(): int;

    public function getStepSizeY(): int;

    public function getShortName(): string;

}