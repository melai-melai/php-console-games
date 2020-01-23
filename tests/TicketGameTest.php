<?php

namespace PhpConsoleGames\Tests;

use PHPUnit\Framework\TestCase;
use PhpConsoleGames\Games\HappyTicketGame;

class TicketGameTest extends TestCase
{
	/**
	 * Test checks for a happy number
	 */
	public function testIsHappy()
	{
		$this->assertTrue(HappyTicketGame\isHappy("300003"));
		$this->assertFalse(HappyTicketGame\isHappy("976011"));
	}

	/**
	 * Test checks ticket number generation
	 */
	public function testGetNumberOfTicket()
	{
		$this->assertIsArray(HappyTicketGame\getNumberOfTicket());
		$this->assertCount(6, HappyTicketGame\getNumberOfTicket());
	}

	/**
	 * Test run the game
	 */
	public function testRunTicketGame()
	{
		$this->assertIsArray(HappyTicketGame\runTicketGame());
		$this->assertCount(3, HappyTicketGame\runTicketGame());
	}
}
