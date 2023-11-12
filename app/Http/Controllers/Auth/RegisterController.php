<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Service\PositionService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    private PositionService $positionService;
    public function __construct(PositionService $positionService)
    {
      $this->positionService=$positionService;

    }

    public function store(UserCreateRequest $userCreateRequest){
          $params=$userCreateRequest->validated();
          $this->create($params);
          return redirect('/users/list')->with('success','Pomyślnie dodano pracownika');

    }

    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'id_stanowiska' => $data['stanowisko'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


  public function index()
  {
    return view('auth.register',[
      'users' => $this->positionService->get()
    ]);

  }

}
