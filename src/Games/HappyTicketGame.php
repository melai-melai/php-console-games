<?php

namespace PhpConsoleGames\Games\HappyTicketGame;

/**
 * Main function of game
 *
 * @return array Array contains question, right answer and messages (win and fail) for input in console
 */
function runTicketGame()
{
    $ticketNumber = implode("", getNumberOfTicket());

    $messages = [
        "correctly" => "Congratulations! Your ticket {$ticketNumber} is happy! \n",
        "wrong" => "Your ticket {$ticketNumber} is not happy! =( \n"
    ];

    $answer = isHappy($ticketNumber);
    $question = "It is number of a happy ticket? Number: {$ticketNumber} \n";

    return [$question, $answer, $messages];
}

/**
 * Check number on happy (sum of first three numbers equals sum of last three numbers)
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
 * Generation of number
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
