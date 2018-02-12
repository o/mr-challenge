<?php

namespace Osman\MarsRoverChallenge;


use Osman\MarsRoverChallenge\Command\Command;
use Osman\MarsRoverChallenge\Command\MoveCommand;
use Osman\MarsRoverChallenge\Command\TurnLeftCommand;
use Osman\MarsRoverChallenge\Command\TurnRightCommand;
use UnexpectedValueException;

final class CommandParser
{

    private $commandMap = [
        'M' => MoveCommand::class,
        'L' => TurnLeftCommand::class,
        'R' => TurnRightCommand::class,
    ];

    /**
     * @param string $commands
     * @return \Generator
     * @throws UnexpectedValueException
     */
    public function stringToCommands(string $commands): ?\Generator
    {
        if ('' === $commands) {
            throw new UnexpectedValueException('Empty command');
        }
        foreach (str_split($commands) as $command) {
            yield $this->getCommandByCharacter($command);
        }
    }

    /**
     * @param string $character
     * @return Command
     * @throws UnexpectedValueException
     */
    private function getCommandByCharacter(string $character): Command
    {
        if (array_key_exists($character, $this->commandMap)) {
            switch ($character) {
                case 'M':
                    return new MoveCommand();
                case 'L':
                    return new TurnLeftCommand();
                case 'R':
                    return new TurnRightCommand();
            }
        }

        throw new UnexpectedValueException('Unknown command');
    }

}