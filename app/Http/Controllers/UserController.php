<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){

        return view('admin.users.profile' ,[
            'user' => $user ,
            'roles' => Role::all()
        ]);
    }

    public function index(){
        $users = User::all();

        return view('admin.users.index' , compact('users'));
    }

    public function update(User $user , UserRequest $req){
        $inputs = $req->validated();

        if($req->avatar){
            $inputs['avatar'] = $req->input('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }

    public function attach(User $user , Request $req){
//       $user->roles()->attach();
//        dd(\request('role_id'));
//        dd($user->roles()->);
        $user->roles()->attach($req->role);
        return back();
    }

    public  function detach(User $user){
        $user->roles()->detach(\request('role'));
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('user-deleted' ,  'User has been deleted');
        return back();

    }


}
