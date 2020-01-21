<?php

namespace PhpConsoleGames\Engine;

use function cli\line;
use function cli\prompt;
use function cli\choose;
use function PhpConsoleGames\Games\HappyTicketGame\runTicketGame;
use function PhpConsoleGames\Games\ParityGame\runParityGame;

/**
 * Main scenario
 */
function run()
{
    line("Hello, my friend! \n");

    $answer = choose("Let's play? \n", $choices = 'yn', $default = 'n');

    if ($answer === "n") {
        line("See you, my friend! \n");
        exit;
    }

    line("I'm glad! \n");
    $name = prompt("What is your name? \n", false, "Your name: ");
    line("Hello, my friend %s! \n", $name);

    line("I have two games for you, %s! \n", $name);
    line("[1] - Happy ticket game \n");
    line("[2] - Parity \n");
    $game = choose("What game do you want to play? \n", $choices = '12', $default = '1');

    handleGame($game);

    $answer = choose("Do you want to repeat? \n", $choices = 'yn', $default = 'n');
    if ($answer === "n") {
        line("See you, my friend! \n");
        exit;
    }

    run();
}

/**
 * Game handler
 *
 * @param  string $gameNumber Game number (from list og games)
 */
function handleGame(string $gameNumber)
{
    $gamesMapping = [
        "1" => function () {
            return runTicketGame();
        },
        "2" => function () {
            return runParityGame();
        }
    ];

    if (array_key_exists($gameNumber, $gamesMapping)) {
        for ($i = 0; $i < 3; $i += 1) {
            [$question, $answer, $messages] = $gamesMapping[$gameNumber]();

            $userAnswer = choose($question, $choices = 'yn', $default = 'n');

            if (($answer && ($userAnswer === "y")) || (!$answer && ($userAnswer === "n"))) {
                line($messages["correctly"]);
            } else {
                line($messages["wrong"]);
            }
        }
    } else {
        line("No, I don't have the game with number %s. \n", $gameNumber);
    }
}
