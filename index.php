<?php


require_once 'vendor/autoload.php';


$plat = new \Osman\MarsRoverChallenge\Model\Plateau(new \Osman\MarsRoverChallenge\Model\Coordinate(5,5));

$rover = new \Osman\MarsRoverChallenge\Rover(new \Osman\MarsRoverChallenge\Model\Coordinate(3,3), new \Osman\MarsRoverChallenge\Model\Orientation\East(), $plat);
$rover->run('MMRMMRMRRM');
echo $rover->getCurrentPosition();
