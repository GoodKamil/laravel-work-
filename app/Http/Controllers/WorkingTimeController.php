<?php

namespace App\Http\Controllers;

use App\Http\Requests\Time\TimeReuqest;
use App\Http\Requests\WorkingTime\WorkingTimeSelectRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Service\WorkingTimeService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WorkingTimeController extends Controller
{

    private UserService $userService;
    private WorkingTimeService $workingTimeService;

    private array $params=[];
    public function __construct(UserService $userService, WorkingTimeService $workingTimeService){
        $this->userService=$userService;
        $this->workingTimeService=$workingTimeService;
    }

  public function index(){
          $users=$this->workingTimeService->getTimeAllUsers($this->params);
          return view('workingTime.index',['users'=>$users]);
  }

  public function selectIndex(WorkingTimeSelectRequest $request){
        $this->params=$request->validated();
        $request->flash();
       return $this->index();
  }

  public function create()
  {
      return view('users.rcp',[
        'users' => $this->userService->get()
      ]);
  }

  public function store(TimeReuqest $reuqest)
  {
   if($this->workingTimeService->store($reuqest->validated())){
       redirect()->back()->with('success','Pomyślnie dodano czas pracy pracownika');
   }
   return redirect()->back()->with('error','Wystąpił problem przy dodawaniu czasu pracy');
  }
}
