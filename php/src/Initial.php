<?php

namespace TennisGame;

class Initial implements GameState
{
    /**
     * @var array|string[]
     */
    private array $scoreMapping = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    public function __construct(private readonly TennisGame4 $game)
    {
    }

    public function getScore(): string
    {
        $player2Wording = $this->game->getPlayer1Score() === $this->game->getPlayer2Score() ? 'All' : $this->scoreMapping[$this->game->getPlayer2Score()];

        return $this->scoreMapping[$this->game->getPlayer1Score()] . '-' . $player2Wording;
    }
}
