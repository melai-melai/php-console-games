<?php

namespace PhpConsoleGames\Games\ParityGame;

/**
 * Main function of game
 *
 * @return array Array contains question, right answer and messages (win and fail) for input in console
 */
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

/**
 * Check all number in array have the same parity
 *
 * @param  array   $numbers Array with numbers
 * @return boolean          Answer
 */
function isSameParity(array $numbers)
{
    if (empty($numbers)) {
        return [];
    }

    $parity = isEvenNumber($numbers[0]);

    foreach ($numbers as $num) {
        if (isEvenNumber($num) !== $parity) {
            return false;
        }
    }

    return true;
}

/**
 * Check number is even
 *
 * @param  int     $num Number
 * @return boolean      Answer
 */
function isEvenNumber(int $num)
{
    return $num % 2 === 0;
}

/**
 * Generation of array with numbers
 *
 * @return array Array with numbers
 */
function getArrayNumbers()
{
    $length = random_int(5, 10);
    $array = [];

    for ($i = 0; $i < $length; $i += 1) {
        $array[] = random_int(-100, 100);
    }

    return $array;
}
