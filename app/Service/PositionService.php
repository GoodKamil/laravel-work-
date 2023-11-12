<?php

namespace App\Service;

use App\Http\Requests\Position\PositionRequest;
use App\Repositories\Position\PositionRepositoryInterface;

class PositionService
{
    private PositionRepositoryInterface $positionRepository;
    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository=$positionRepository;

    }

    public function getParams(PositionRequest $request):array{

        return [
            ...$request->validated(),
            'chemia'=>$request->post('chemia',0),
            'halas'=>$request->post('halas',0),
            'inne'=>$request->post('inne',0),
        ];
    }

    public function get(){
        return $this->positionRepository->get();
    }

    public function store(array $params):bool{
      return $this->positionRepository->save($params);
    }
    public function update(int $id,array $params):bool{
        return $this->positionRepository->update($id,$params);
    }
}
