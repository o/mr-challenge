<?php
/**
 * Created by IntelliJ IDEA.
 * User: osman
 * Date: 12/02/2018
 * Time: 20:12
 */

namespace Osman\MarsRoverChallenge\Command;


use Osman\MarsRoverChallenge\Rover;

class MoveCommand implements Command
{
    public function execute(Rover $rover): void
    {
        $rover->move();
    }


}