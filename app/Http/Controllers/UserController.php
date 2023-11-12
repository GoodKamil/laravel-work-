<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Position\PositionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private PositionRepositoryInterface $positionRepository;
    public function __construct(UserRepositoryInterface $userRepository,PositionRepositoryInterface $positionRepository){
         $this->userRepository=$userRepository;
         $this->positionRepository=$positionRepository;
    }

    public function index()
    {
      return view('users.index',[
        'users' => $this->userRepository->get()
      ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    }

    public function update(Request $req, $id)
    {
      DB::table('users')
      ->where('id',$id)
      ->update([
        'name' =>$req -> input('name'),
        'surname' =>$req -> input('surname'),
        'id_stanowiska' =>$req -> input('stanowisko'),
        'email' =>$req -> input('email'),
      ]) ;
      return $this -> index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return $this->index();
    }

    public function editview(User $user)
    {
      if(!$user->exists){
          abort(403,'Brak dostępu');
      }
      return view('auth.edit',[
        'users' => $this->positionRepository->get(),
        'datas' => $user
      ]);
    }


}
