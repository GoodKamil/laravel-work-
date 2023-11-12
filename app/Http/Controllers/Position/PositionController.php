<?php

namespace App\Http\Controllers\Position;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Position\PositionRequest;
use App\Models\Position;
use App\Service\PositionService;

class PositionController extends Controller
{
    private PositionService $positionService;
    public function __construct(PositionService $positionService){
        $this->positionService=$positionService;
    }

    public function index(){
        return view('position.index',[
            'positions'=>$this->positionService->get()
        ]);
    }

    public function store(){
        return view('position.store',[
           'types'=>UserRole::TYPES
        ]);
    }

    public function create(PositionRequest $request){
             $params=$this->positionService->getParams($request);
             if($this->positionService->store($params)){
              return redirect('/Position')->with('success','Pomyślnie dodano stanowisko');
              }
             return redirect('/Position')->with('error','Wystąpił problem przy dodawaniu stanowiska');
    }

    public function edit(Position $position){
        if(!$position->exists){
            abort('403','Nie znaleziono stanowiska');
        }
        return view('position.edit',[
            'position'=>$position,
            'types'=>UserRole::TYPES
        ]);
    }

    public function update(Position $position,PositionRequest $request)
    {
        if(!$position->exists){
            abort('403','Nie znaleziono stanowiska');
        }
        $params=$this->positionService->getParams($request);
        if($this->positionService->update($position->id,$params)){
            return redirect('/Position')->with('success','Pomyślnie edytowano stanowisko');
        }
        return redirect('/Position')->with('error','Wystąpił problem przy edytowaniu stanowiska');
    }

    public function delete(Position $position){
        try{
            if(!$position->exists) {
                return response()->json(['message' => 'Nie znaleziono stanowiska', 'codeText' => 'error']);
            }

           if($position->userExists()){
               return response()->json(['message' => 'Nie można usunąć stanowiska ponieważ są do niego przypisani użytkownicy', 'codeText' => 'error']);
           }

            if($position->delete()){
                return response()->json(['message'=>'Pomyślnie usunięto stanowisko','codeText'=>'success']);
            }
            return response()->json(['message'=>'Wystąpił problem przy usuwaniu stanowiska','codeText'=>'error']);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'codeText'=>'error']);
        }
    }
}
