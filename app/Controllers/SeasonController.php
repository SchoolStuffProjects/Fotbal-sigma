<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeasonModel;
use App\Models\LeagueModel;
use App\Models\LeagueSeasonModel;
use App\Models\GameModel;
use App\Models\TeamModel;

class SeasonController extends BaseController
{
    protected $seasonModel;
    protected $leagueModel;
    protected $leagueSeasonModel;
    protected $gameModel;
    protected $teamModel;
    protected $data = [];

    public function __construct()
    {
        $this->seasonModel = new SeasonModel();
        $this->leagueModel = new LeagueModel();
        $this->leagueSeasonModel = new LeagueSeasonModel();
        $this->gameModel = new GameModel();
        $this->teamModel = new TeamModel();
    }

    public function index()
    {
        $perPage = 25;
        $page = $this->request->getVar('page') ?? 1;

        $this->data['seasons'] = $this->seasonModel
            ->orderBy('start', 'DESC')
            ->paginate($perPage, 'default', $page);

        $this->data['pager'] = $this->seasonModel->pager;

        return view('seasons/index', $this->data);
    }

    public function games($seasonId)
    {
        $season = $this->seasonModel->find($seasonId);

        $leagueSeasons = $this->leagueSeasonModel
            ->where('id_season', $seasonId)
            ->findAll();

        $leagueSeasonIds = array_column($leagueSeasons, 'id');

        $games = $this->gameModel
            ->whereIn('id_league_season', $leagueSeasonIds)
            ->orderBy('round', 'ASC')
            ->findAll();

        $teamIds = [];
        foreach ($games as $game) {
            $teamIds[] = $game->home;
            $teamIds[] = $game->away;
        }
        $teamIds = array_unique($teamIds);

        $teams = $this->teamModel
            ->whereIn('id', $teamIds)
            ->findAll();
        $teams = array_column($teams, null, 'id');

        $this->data['season'] = $season;
        $this->data['games'] = $games;
        $this->data['teams'] = $teams;

        return view('seasons/games', $this->data);
    }

    public function matchDetail($matchId)
    {
        $match = $this->gameModel->find($matchId);

        $homeTeam = $this->teamModel->find($match->home);
        $awayTeam = $this->teamModel->find($match->away);

        $this->data['match'] = $match;
        $this->data['homeTeam'] = $homeTeam;
        $this->data['awayTeam'] = $awayTeam;

        return view('seasons/match_detail', $this->data);
    }
}