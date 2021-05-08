<?php

namespace App\Http\Controllers;

use App\Repositories\CharacterRepository;
use App\Repositories\ServerRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    protected ServerRepository $serverRepository;
    protected CharacterRepository $characterRepository;

    public function __construct()
    {
        $this->characterRepository = new CharacterRepository();
        $this->serverRepository = new ServerRepository();
    }

    public function show($region, $serverName, $username)
    {
        $server = $this->serverRepository->findOneBy([
            'region' => $region,
            'name' => $serverName,
        ]);

        if($server)
        {
            $character = $this->characterRepository->findOneBy([
                'server_id' => $server->id,
                'username' => $username
            ]);

            if($character)
            {
                $character = $character->toJson();
                return view('character.index', ['character' => $character]);
            }
        }
        return redirect()->route('landing');

    }

    public function search(Request $request): RedirectResponse
    {
        $data = [
            'region' => $request->input('region'),
            'server' => $request->input('serverName'),
            'username' => $request->input('username')
        ];

        return redirect()->route('character.show', $data);
    }

    public function filterByUsername($region, $server, $username): string
    {
        return $this->characterRepository->findBySearch($region, $server, $username, 'username')->toJson();
    }

    public
    function filterByServer($region, $server): string
    {
        return $this->characterRepository->findBySearch($region, $server, '', 'username')->toJson();
    }
}
