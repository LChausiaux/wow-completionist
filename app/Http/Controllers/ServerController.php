<?php

namespace App\Http\Controllers;

use App\Repositories\ServerRepository;

class ServerController extends Controller
{
    protected ServerRepository $serverRepository;

    public function __construct()
    {
        $this->serverRepository = new ServerRepository();
    }

    public function filter($server): string
    {
        return $this->serverRepository->findBySearch($server);
    }
}
