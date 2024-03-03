<?php

namespace TennisGame;

readonly class Advantage implements GameState
{
    public function __construct(private TennisGame4 $game)
    {
    }

    public function getScore(): string
    {
        $leader = $this->game->getPlayer1Score() > $this->game->getPlayer2Score() ? $this->game->getPlayer1() : $this->game->getPlayer2();

        return 'Advantage ' . $leader;
    }
}
