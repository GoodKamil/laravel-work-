<?php

namespace App\Repositories\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements  UserRepositoryInterface
{

    private User $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel=$userModel;
    }


    public function get(array $where=[]): Collection|array
    {
        return $this->userModel
            ->with('Position')
            ->where('delete','=',0)
            ->where('id','!=',auth()->user()->id)
            ->where($where)
            ->get();
    }

    public function save(array $params): void
    {
        $this->userModel
            ->create($params);
    }

    public function update(int $id, array $params):void
    {
        $this->userModel
            ->where('id',$id)
            ->update($params);
    }

    public function delete(int $id):void
    {
        $this->userModel
            ->where('id',$id)
            ->update('delete',1);
    }

    public function find(int $id)
    {
        return $this->userModel
            ->find($id);
    }
}
