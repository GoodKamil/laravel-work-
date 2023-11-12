<?php

namespace App\Service;

use App\Repositories\WorkingTime\WorkingTimeRepositoryInterface;

class WorkingTimeService
{
    private WorkingTimeRepositoryInterface $workingTimeRepository;
    public function __construct(WorkingTimeRepositoryInterface $workingTimeRepository){
        $this->workingTimeRepository=$workingTimeRepository;
    }

    public function getTimeAllUsers(array $params){
        return $this->workingTimeRepository->getTimeAllUsers($params);
    }

    public function getTime(array $params){
        return $this->workingTimeRepository->getTime($params);
    }

    public function store(array $params):bool
    {
       return  $this->workingTimeRepository->save($params);
    }
    public function update(int $id, array $params):bool
    {
        return $this->workingTimeRepository->update($id,$params);
    }

    public function getUserWorkingTime(int $idUser){
        return $this->workingTimeRepository->getUserWorkingTime($idUser);
    }
    public function delete(int $idTime):bool{
        return $this->workingTimeRepository->delete($idTime);
    }
}
