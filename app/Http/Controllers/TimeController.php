<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkingTime\WorkingTimeRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\WorkingTime\WorkingTimeRepositoryInterface;
use App\Service\WorkingTimeService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    private UserService $userService;
    private WorkingTimeService $workingTimeService;
    private array $timeWord=[];
    public function __construct(UserService $userService, WorkingTimeService $workingTimeService)
    {
        $this->userService=$userService;
        $this->workingTimeService=$workingTimeService;
    }
  public function index()
    {
        return view('users.Timeform',[
          'users' => $this->userService->get(),
          'timeWord'=>$this->timeWord
        ]);
    }
    public function showhour()
    {
          return 0;
    }

  public function showTime(WorkingTimeRequest $request)
  {
    $this->timeWord=$this->workingTimeService->getTime($request->validated());
    $request->flash();
    return $this->index();
  }
}
