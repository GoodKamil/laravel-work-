<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function get(array $where);

    public function find(int $id);
    public function save(array $params);
    public function update(int $id,array $params);
    public function delete(int $id);

}
