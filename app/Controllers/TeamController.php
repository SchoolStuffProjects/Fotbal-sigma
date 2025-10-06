<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TeamController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Teams';

        return view('teams', $data);
    }
}
