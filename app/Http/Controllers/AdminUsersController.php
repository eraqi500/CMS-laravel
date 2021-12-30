<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\Traits\usersTrait;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('layouts.admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::pluck('name','id');
//        dd($roles);
        return view('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    use usersTrait;

    public function store(AdminRequest $request)
    {
//        return $request->all();
//        User::create($request->all());
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }

//        $input = $request->all();

        $photo = $request->file('avatar');

        if($photo){
            $file_name  = $this->saveImage($photo, 'UserImages');
            $img = new Photo;
            $img -> file = $file_name;
            $img->save();
            $input['avatar'] = $img -> id;
        }

//        dd($input);

        User::create($input);

        return  redirect('/admin/edwin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      $roles = Role::pluck('name', 'id');

      return view('admin.users.edit' ,  compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AdminEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }


//        $input = $request->all();
        $file = $request->file('avatar');

        if($file){
            $name = time() . $file->getClientOriginalExtension();
            $file -> move('UserImages', $name);
            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        }
        $user -> update($input);
        return redirect('/admin/edwin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->file);

        $user -> delete() ;

        session('deleted_user' , 'The user has been deleted');
        redirect('/admin/users');
    }
}
