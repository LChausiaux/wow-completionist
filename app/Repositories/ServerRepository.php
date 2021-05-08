<?php

namespace App\Repositories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @package Repositories
 */
class ServerRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Server::class);
    }
}
