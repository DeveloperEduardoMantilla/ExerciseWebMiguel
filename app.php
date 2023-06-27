<?php
class Tournament
{
    /** @var TeamScore[] */
    private array $teams = [];
    public function tally(string $score): string
    {
        if ($score !== '') {
            foreach (explode("\n", $score) as $line) {
                [$teamA, $teamB, $result] = explode(';', $line);
                $this->teams[$teamA] ??= new TeamScore($teamA);
                $this->teams[$teamB] ??= new TeamScore($teamB);
                switch ($result) {
                    case 'win':
                        $this->teams[$teamA]->addWin();
                        $this->teams[$teamB]->addLoss();
                        break;
                    case 'draw':
                        $this->teams[$teamA]->addDraw();
                        $this->teams[$teamB]->addDraw();
                        break;
                    case 'loss':
                        $this->teams[$teamA]->addLoss();
                        $this->teams[$teamB]->addWin();
                }
            }
        }
        //La función de comparación utiliza una expresión de comparación de la nave espacial <=> para ordenar los equipos primero por puntos de forma descendente y luego por nombre de forma ascendente.
        usort($this->teams, static fn(TeamScore $a, TeamScore $b) =>
            [$b->getPoints(), $a->getName()] <=> [$a->getPoints(), $b->getName()]
        );
        return implode("\n", ["Team                           | MP |  W |  D |  L |  P", ...$this->teams]);
    }
}
class TeamScore
{
    private string $team;
    private int    $wins   = 0;
    private int    $losses = 0;
    private int    $draws  = 0;
    public function __construct(string $team)
    {
        $this->team = $team;
    }
    public function addWin(): void
    {
        $this->wins++;
    }
    public function addLoss(): void
    {
        $this->losses++;
    }
    public function addDraw(): void
    {
        $this->draws++;
    }
    public function __toString()
    {
        return sprintf(
            '%-31s|  %d |  %d |  %d |  %d |  %d',
            $this->team,
            $this->getMatchesPlayed(),
            $this->wins,
            $this->draws,
            $this->losses,
            $this->getPoints()
        );
    }
    public function getMatchesPlayed(): int
    {
        return $this->wins + $this->losses + $this->draws;
    }
    public function getPoints(): int
    {
        return 3 * $this->wins + $this->draws;
    }
    public function getName(): string
    {
        return $this->team;
    }
}