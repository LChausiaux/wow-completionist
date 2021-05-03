<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function show($region, $server, $username)
    {
        $data = [
            'region' => $region,
            'server' => $server,
            'username' => $username
        ];
        return view('character.index', $data);
    }

    public function search(Request $request): RedirectResponse
    {
        $data = [
            'region' => $request->input('region'),
            'server' => $request->input('server'),
            'username' => $request->input('username'),
        ];
        return redirect()->route('character.show', $data);
    }
}
