<?php

namespace App\Repositories\Position;

use App\Models\Position;

class PositionRepository implements PositionRepositoryInterface
{
    private Position $positionModel;
    public function __construct(Position $positionModel)
    {
        $this->positionModel=$positionModel;
    }

    public function get(array $where=[])
    {
        return $this->positionModel
            ->where($where)
            ->get();
    }

    public function save(array $params):bool
    {
        return $this->positionModel
            ->fill($params)
            ->save();
    }

    public function update(int $id, array $params):bool
    {
        return $this->positionModel
            ->where('id',$id)
            ->update($params);
    }

    public function delete(int $id)
    {
        return $this->positionModel
            ->where('id',$id)
            ->delete();
    }
}
