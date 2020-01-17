<?php

namespace PhpConsoleGames\Engine;

use function cli\line;
use function cli\prompt;
use function cli\choose;

use function PhpConsoleGames\Games\HappyTicketGame\runTicketGame;
use function PhpConsoleGames\Games\ParityGame\runParityGame;


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
	$game = prompt("What game do you want to play? \n", false, "Your answer [1|2]: ");

	handleGame($game);

	$answer = choose("Do you want to exit or repeat again? \n [1] - exit, [2] - repeat \n", $choices = 'yn', $default = 'n');
	if ($answer === 'n') {
		line("See you, my friend! \n");
		exit;
	} else {
		run();
	}
}

function handleGame($gameNumber)
{
	$gamesMapping = [
		"1" => function() {
			return runTicketGame();
		},
		"2" => function() {
			return runParityGame();
		}
	];

	if (array_key_exists($gameNumber, $gamesMapping)) {
		for ($i = 0; $i < 3; $i += 1) {
			[$question, $answer, $messages] = $gamesMapping[$gameNumber]();

			$userAnswer = choose($question, $choices = 'yn', $default = 'n');

			if ($answer == $userAnswer) {
				line($messages["correctly"]);
			} else {
				line($messages["wrong"]);
			}
		}
	} else {
		line("No, I don't have the game with number %s. \n", $gameNumber);
	}	
}
