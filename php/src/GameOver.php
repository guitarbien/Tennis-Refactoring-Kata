<?php

namespace TennisGame;

readonly class GameOver implements GameState
{
    public function __construct(private TennisGame4 $game)
    {
    }

    public function getScore(): string
    {
        $winner = $this->game->getPlayer1Score() > $this->game->getPlayer2Score() ? $this->game->getPlayer1() : $this->game->getPlayer2();

        return 'Win for ' . $winner;
    }
}
