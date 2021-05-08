<?php

namespace App\Http\Controllers;

use App\Repositories\CharacterRepository;
use App\Repositories\ServerRepository;

class ShowLandingPage extends Controller
{
    protected ServerRepository $serverRepository;
    protected CharacterRepository $characterRepository;

    public function __construct()
    {
        $this->serverRepository = new ServerRepository();
        $this->characterRepository = new CharacterRepository();
    }

    public function __invoke()
    {
        $servers = $this->serverRepository->findAll()->sortBy('name');
        $characters = $this->characterRepository->findBySearch('EU', $servers->first()->name, '', 'username')->toJson();
        $servers = $servers->groupBy('region')->toJson();
        return view('welcome', ['servers' => $servers, 'characters' => $characters]);
    }
}
