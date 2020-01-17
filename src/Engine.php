<?php

namespace PhpConsoleGames\Engine;

use function cli\line;
use function cli\prompt;

use function PhpConsoleGames\Games\HappyTicketGame\isHappy;

function run()
{
	line("Hello, my friend! \n");
	$answer = prompt("Let's play? \n", false, "Your answer [yes|no]: ");
	if ($answer === "no") {
		line("See you, my friend! \n");
		exit;
	}

	line("I'm glad! \n");
	$name = prompt("What is your name? \n", false, "Your answer: ");
	line("Hello, my friend %s! \n", $name);

	line("I have two games for you, %s! \n", $name);
	line("[1] - Happy ticket game \n");
	line("[2] - Parity \n");
	$game = prompt("What game do you want to play? \n", false, "Your answer [1|2]: ");

	switch ($game) {
		case "1":
			line("Here will be 'Happy ticket game' \n");
			$ticket = prompt("Enter your ticket number: \n", false, "Your answer: ");
			$answer = isHappy($ticket);
			if ($answer) {
				line("Congratulations! Your ticket %s is happy!' \n", $ticket);
			} else {
				line("Your ticket %s is not happy! =(' \n", $ticket);
			}
			break;
		case "2":
			line("Here will be 'Parity Game' \n");
			break;
		default:
			line("No, I don't have the game with number %s. \n", $game);
	}

	$answer = prompt("Do you want to exit or repeat again? \n [1] - exit, [2] - repeat \n", false, "Your answer [1|2]: ");
	if ($answer === '1') {
		line("See you, my friend! \n");
		exit;
	} else {
		run();
	}

}
