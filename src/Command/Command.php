<?php


namespace Osman\MarsRoverChallenge\Command;


use Osman\MarsRoverChallenge\Rover;

interface Command
{

    /**
     * Executes command
     * @param Rover $rover
     * @throws \OutOfBoundsException
     */
    public function execute(Rover $rover): void;

}