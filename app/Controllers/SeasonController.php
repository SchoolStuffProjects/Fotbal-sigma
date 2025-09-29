<?php

namespace App\Controllers;

use App\Models\SeasonModel;
use App\Models\LeagueModel;
use App\Models\GameModel;
use App\Models\TeamModel;

class SeasonController extends BaseController
{
    protected $seasonModel;
    protected $leagueModel;
    protected $gameModel;
    protected $teamModel;

    public function __construct()
    {
        $this->seasonModel = new SeasonModel();
        $this->leagueModel = new LeagueModel(); 
        $this->gameModel   = new GameModel();
        $this->teamModel   = new TeamModel();
    }

    public function index()
    {
        $perPage = 25;

        $page = $this->request->getVar('page') ?? 1;

        $seasons = $this->seasonModel->orderBy('start', 'DESC')->paginate($perPage, 'default', $page);

        $pager = $this->seasonModel->pager;

        echo view('seasons/index', ['seasons' => $seasons,'pager' => $pager,]);
    }

    public function show($seasonId)
    {
        $season = $this->seasonModel->find($seasonId);

        $leagues = $this->leagueModel
            ->join('league_season', 'league.id = league_season.id_league')
            ->where('league_season.id_season', $seasonId)
            ->select('league.*')
            ->findAll();


        echo view('seasons/show', [
            'season' => $season,
            'leagues' => $leagues,
        ]);
    }

    public function matches($seasonId)
    {
        $season = $this->seasonModel->find($seasonId);
        $matches = $this->gameModel
            ->where('season_id', $seasonId)
            ->orderBy('round', 'ASC')
            ->findAll();

        $teams = [];
        foreach ($matches as $match) {
            if (!isset($teams[$match->home_team])) {
                $teams[$match->home_team] = $this->teamModel->find($match->home_team);
            }
            if (!isset($teams[$match->away_team])) {
                $teams[$match->away_team] = $this->teamModel->find($match->away_team);
            }
        }

        $matchesByRound = [];
        foreach ($matches as $match) {
            $matchesByRound[$match->round][] = $match;
        }

        echo view('seasons/matches', [
            'season' => $season,
            'matchesByRound' => $matchesByRound,
            'teams' => $teams,
        ]);
    }

    public function matchDetail($matchId)
    {
        $match = $this->gameModel->find($matchId);
        $homeTeam = $this->teamModel->find($match->home_team);
        $awayTeam = $this->teamModel->find($match->away_team);

        echo view('seasons/match_detail', [
            'match' => $match,
            'homeTeam' => $homeTeam,
            'awayTeam' => $awayTeam,
        ]);
    }
}
