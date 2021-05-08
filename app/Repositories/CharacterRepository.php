<?php

namespace App\Repositories;

use App\Models\Character;

/**
 * @package Repositories
 */
class CharacterRepository extends Repository
{
    protected ServerRepository $serverRepository;

    public function __construct()
    {
        parent::__construct(Character::class);
        $this->serverRepository = new ServerRepository();
    }

    /**
     * @param $region
     * @param $serverName
     * @param $username
     * @param $sorting
     * @return mixed
     */
    public function findBySearch($region, $serverName, $username, $sorting)
    {
        $server = $this->serverRepository->findOneBy([
            'region' => $region,
            'name' =>$serverName
        ]);
        return Character::select(['id', 'username'])->where('server_id', $server->id)->where('username', 'like', $username . '%')->orderBy($sorting)->take(10)->get();
    }
}
