<?php

namespace PhpConsoleGames\Tests;

use PHPUnit\Framework\TestCase;
use PhpConsoleGames\Games\ParityGame;

class ParityGameTest extends TestCase
{
	/**
	 * Test check on the same parity
	 */
	public function testIsSameParity()
	{
		$this->assertTrue(ParityGame\isSameParity([2, 4, 6]));
		$this->assertTrue(ParityGame\isSameParity([-1, 5, -23]));

		$this->assertFalse(ParityGame\isSameParity([1, 2, 7, 11]));
		$this->assertFalse(ParityGame\isSameParity([-21, 10, -4]));
	}

	/**
	 * Test check number is even
	 */
	public function testIsEvenNumber()
	{
		$this->assertTrue(ParityGame\isEvenNumber(2));
		$this->assertTrue(ParityGame\isEvenNumber(10));

		$this->assertFalse(ParityGame\isEvenNumber(7));
		$this->assertFalse(ParityGame\isEvenNumber(21));
	}
}