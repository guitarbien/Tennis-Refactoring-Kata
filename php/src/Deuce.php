<?php

namespace TennisGame;

readonly class Deuce implements GameState
{
    public function __construct(private TennisGame4 $game)
    {
    }

    public function getScore(): string
    {
        return 'Deuce';
    }
}
