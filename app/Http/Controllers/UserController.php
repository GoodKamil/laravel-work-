<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Position\PositionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;

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
      return redirect('/users/list')->with('success','Pomyślnie edytowano użytkownika');
    }

    public function destroy(int $id)
    {
        try {
            DB::table('users')->where('id', $id)->delete();
            DB::table('czas_pracy')->where('id_pracownika', $id)->delete();
            return response()->json(['message' => 'Pomyślnie usunięto użytkownika', 'codeText' => 'success']);
        }catch(Exception $e){
            return response()->json(['message'=>'Wystąpił problem przy usuwaniu użytkownika','codeText'=>'error']);
        }
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
