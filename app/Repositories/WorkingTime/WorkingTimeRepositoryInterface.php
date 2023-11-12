<?php

namespace App\Repositories\WorkingTime;

interface WorkingTimeRepositoryInterface
{
    public function get(array $where);
    public function save(array $params):bool;
    public function update(int $id,array $params):bool;
    public function delete(int $id):bool;

    public function getTime(array $params);

    public function getTimeAllUsers(array $params);

    public function getUserWorkingTime(int $idUser);
}
