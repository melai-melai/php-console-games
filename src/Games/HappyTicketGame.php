<?php

namespace PhpConsoleGames\Games\HappyTicketGame;

function isHappy(string $number)
{
    $length = mb_strlen($number);
    if ($length === 0 || $length % 2 !== 0) {
        return false;
    }

    $balance = 0;
    for ($i = 0, $j = $length - 1; $i < $j; $i += 1, $j -= 1) {
        $balance += $number[$i] - $number[$j];
    }

    return $balance === 0;
}

function getNumberOfTicket()
{
	$length = 6;
	$number = [];

	for ($i = 0; $i < $length; $i += 1) {
		$number[] = random_int(0, 9);
	}

	return $number;
}
