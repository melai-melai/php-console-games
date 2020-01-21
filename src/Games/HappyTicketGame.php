<?php

namespace PhpConsoleGames\Games\HappyTicketGame;

/**
 * The main function of the game
 *
 * @return array Array contains question, right answer and messages (win and fail) for input in console
 */
function runTicketGame()
{
    $ticketNumber = implode("", getNumberOfTicket());

    $messages = [
        "correctly" => "Congratulations! You are right!\n",
        "wrong" => "You are wrong! =( \n"
    ];

    $answer = isHappy($ticketNumber);
    $question = "\nIt is a happy ticket number? Number: {$ticketNumber} \n";

    return [$question, $answer, $messages];
}

/**
 * Checks a number for a happy number (the sum of the first three numbers is equal to the sum of the last three numbers)
 *
 * @param  string  $number Number of ticket
 * @return boolean         Answer
 */
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

/**
 * Number generation
 *
 * @return array Number of ticket
 */
function getNumberOfTicket()
{
    $length = 6;
    $number = [];

    for ($i = 0; $i < $length; $i += 1) {
        $number[] = random_int(0, 9);
    }

    return $number;
}
