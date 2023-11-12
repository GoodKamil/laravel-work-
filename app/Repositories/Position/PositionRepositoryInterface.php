<?php

namespace App\Repositories\Position;

interface PositionRepositoryInterface
{
     public function get(array  $where=[]);
     public function save(array $params):bool;
     public function  update(int $id,array $params):bool;

     public function delete(int $id);
}
