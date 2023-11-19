<?php

namespace App\Repositories\WorkingTime;

use App\Models\WorkingTime;
use Illuminate\Support\Facades\DB;

class WorkingTimeRepository implements WorkingTimeRepositoryInterface
{
    private WorkingTime $workingTimeModel;
    public function __construct(WorkingTime $workingTimeModel)
    {
       $this->workingTimeModel=$workingTimeModel;
    }

    public function get(array $where)
    {
        return $this->workingTimeModel
            ->where($where)
            ->get();
    }

    public function save(array $params): bool
    {
        return $this->workingTimeModel
            ->fill($params)
            ->save();
    }

    public function update(int $id, array $params): bool
    {
       return $this->workingTimeModel
            ->where('id',$id)
            ->update($params);
    }

    public function delete(int $id):bool
    {
        return $this->workingTimeModel
            ->where('id',$id)
            ->delete();
    }

    public function getTime(array $params)
    {

         $query=$this->workingTimeModel
         ->where('id_pracownika',$params['pracownik'] ?? 0);
         if(isset($params['miesiac']) && $params['miesiac']!='0'){
             $query->whereMonth('dzien',$params['miesiac']);
         }
        if(isset($params['rok']) && $params['rok']!='0') {
            $query->whereYear('dzien', $params['rok']);
        }
       return $query->get()->sum('godziny');
    }

    public function getTimeAllUsers(array $params)
    {
        $query=WorkingTime::selectRaw('SUM(czas_pracy.godziny) as suma,users.name,users.surname,users.email,users.id')
            ->Join('users', 'users.id', '=', 'czas_pracy.id_pracownika')
            ->where('users.delete',0);
        if(isset($params['miesiac']) && $params['miesiac']!='0'){
            $query->whereMonth('dzien',$params['miesiac']);
        }
        if(isset($params['rok']) && $params['rok']!='0') {
            $query->whereYear('dzien', $params['rok']);
        }
        //        $query=$this->workingTimeModel
//            ->selectRaw('sum(godziny) as suma,users.name,users.surname,users.email')
//            ->withWhereHas('User',function($qu){
//               return $qu->where('delete',0);
//            });
        return $query->groupBy('users.email', 'users.name', 'users.surname','users.id')->get();
    }

    public function getUserWorkingTime(int $idUser)
    {
       return $this->workingTimeModel
           ->WhereHas('User',function($builder) use ($idUser){
               return $builder->where('id',$idUser)->where('delete',0);
           })
           ->get();
    }
}
