<?php

namespace PhpConsoleGames\Tests;

use PHPUnit\Framework\TestCase;
use PhpConsoleGames\Games\HappyTicketGame;

class TicketGameTest extends TestCase
{
	/**
	 * Test check on happy number
	 */
	public function testIsHappy()
	{
		$this->assertTrue(HappyTicketGame\isHappy("300003"));
		$this->assertFalse(HappyTicketGame\isHappy("976011"));
	}

	/**
	 * Test check get number of ticket
	 */
	public function testGetNumberOfTicket()
	{
		$this->assertCount(6, HappyTicketGame\getNumberOfTicket());
	}
}
