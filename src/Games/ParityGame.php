<?php

namespace PhpConsoleGames\Games\ParityGame;

function isSameParity(array $numbers)
{
    if (empty($numbers)) {
        return [];
    }

    $parity = isEvenNumber($numbers[0]);

    $result = [];
    foreach ($numbers as $num) {
        if (isEvenNumber($num) === $parity) {
            $result[] = $num;
        }
    }

    return $result;
}

function isEvenNumber($num)
{
    return $num % 2 === 0;
}

function getArrayNumbers()
{
	$length = random_int(5, 10);
	$array = [];

	for ($i = 0; $i < $length; $i += 1) {
		$array[] = random_int(-100, 100);
	}

	return $array;
}
