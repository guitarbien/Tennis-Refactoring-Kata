<?php

declare(strict_types=1);

namespace Tests;

use TennisGame\TennisGame4;

/**
 * TennisGame4 test case.
 */
class TennisGame4Test extends TestMaster
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->game = new TennisGame4('player1', 'player2');
    }

    /**
     * @dataProvider data
     */
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->seedScores($score1, $score2);
        $this->assertSame($expectedResult, $this->game->getScore());
    }
}