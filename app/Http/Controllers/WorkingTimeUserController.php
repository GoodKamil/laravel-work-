<?php

namespace App\Http\Controllers;

use App\Http\Requests\Time\TimeReuqest;
use App\Models\User;
use App\Models\WorkingTime;
use App\Service\UserService;
use App\Service\WorkingTimeService;

class WorkingTimeUserController extends Controller
{
    private UserService $userService;
    private WorkingTimeService $workingTimeService;
    public function __construct(UserService $userService, WorkingTimeService $workingTimeService){
        $this->userService=$userService;
        $this->workingTimeService=$workingTimeService;
    }

    public function show(User $user){
        if(!$user->exists || $user->delete){
            abort('403','Nie znaleziono użytkownika');
        }
        $workingTimesUser=$this->workingTimeService->getUserWorkingTime($user->id);
        return view('workingTime.show',[
            'user'=>$user,
            'workingTimesUser'=>$workingTimesUser
        ]);
    }

    public function showProfileWorkingTime(){
        return view('workingTime.profileWorkingTime',[
            'workingTimesUser'=>$this->workingTimeService->getUserWorkingTime(auth()->user()->id)
        ]);
    }

    public function edit(WorkingTime $workingTime){
       if(!$workingTime->exists){
           abort('403','Nie znaleziono użytkownika');
       }
       return view('workingTime.edit',[
           'user'=>$workingTime
       ]);
    }

    public function update(WorkingTime $workingTime,TimeReuqest $reuqest){
        if(!$workingTime->exists){
            abort('403','Nie znaleziono użytkownika');
        }
        $params=$reuqest->except(['id_pracownika','_token']);
        if($this->workingTimeService->update($workingTime->id,$params)){
            redirect(route('workingTimeUser.show',[$workingTime->id_pracownika]))->with('success','Pomyślnie edytowano czas pracy pracownika');
        }
        return redirect(route('workingTimeUser.show',[$workingTime->id_pracownika]))->with('error','Wystąpił problem przy edytowano czasu pracy');

    }

    public function delete(int $id){
        try{
            if($this->workingTimeService->delete($id)){
                return response()->json(['message'=>'Pomyślnie usunięto informację o czasie pracy pracownika','codeText'=>'success']);
            }
            return response()->json(['message'=>'Wystąpił problem przy usuwaniu informacji o czasie pracownika','codeText'=>'error']);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'codeText'=>'error']);
        }

    }
}
