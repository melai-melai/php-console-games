<?php

namespace PhpConsoleGames\Games\ParityGame;

function runParityGame()
{
	$numberArray = getArrayNumbers();
	$numberStr = implode(", ", $numberArray);
	
	$messages = [
		"correctly" => "Congratulations! [{$numberStr}] is with the same parity! \n",
		"wrong" => "[{$numberStr}] is not with the same parity! =( \n"
	];

	$answer = isSameParity($numberArray);
	$question = "All numbers are the same parity? Array: {$numberStr} \n";

	return [$question, $answer, $messages];
}

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
