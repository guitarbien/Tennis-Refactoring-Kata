<?php

namespace TennisGame;

class TennisGame4 implements TennisGame
{
    private Deuce $deuce;
    private Advantage $advantage;
    private GameOver $gameOver;
    private GameState $state;
    private int $player1Score = 0;
    private int $player2Score = 0;

    public function __construct(private readonly string $player1, private readonly string $player2)
    {
        $this->deuce = new Deuce($this);
        $this->advantage = new Advantage($this);
        $this->gameOver = new GameOver($this);

        $this->state = new Initial($this);
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === $this->player1) {
            $this->player1Score++;
        }
        elseif ($playerName === $this->player2) {
            $this->player2Score++;
        }
        else {
            throw new \RuntimeException('not match');
        }

        $this->nextState();
    }

    public function getScore(): string
    {
        return $this->state->getScore();
    }

    private function nextState(): void
    {
        if ($this->isDeuce()) {
            $this->state = $this->deuce;
        }
        elseif ($this->isGameOver()) {
            $this->state = $this->gameOver;
        }
        elseif ($this->isAdvantage()) {
            $this->state = $this->advantage;
        }
    }

    private function isDeuce(): bool
    {
        return ($this->player1Score === $this->player2Score) && $this->player1Score >= 3;
    }

    private function isReadyToWin(): bool
    {
        return $this->player1Score >= 4 || $this->player2Score >= 4;
    }

    private function isGameOver(): bool
    {
        return $this->isReadyToWin() && abs($this->player1Score - $this->player2Score) >= 2;
    }

    private function isAdvantage(): bool
    {
        return $this->isReadyToWin() && abs($this->player1Score - $this->player2Score) === 1;
    }

    public function getPlayer2Score(): int
    {
        return $this->player2Score;
    }

    public function getPlayer1Score(): int
    {
        return $this->player1Score;
    }

    public function getPlayer1(): string
    {
        return $this->player1;
    }

    public function getPlayer2(): string
    {
        return $this->player2;
    }
}
