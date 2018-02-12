<?php


namespace Osman\MarsRoverChallenge\Command;


use Osman\MarsRoverChallenge\Rover;

interface Command
{

    public function execute(Rover $rover): void;

}