<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){
        return view('admin.roles.index' ,[
            'roles' => Role::all(),
        ]);
    }

    public function store(RoleRequest $req){

       $role = new Role;
        $role->name = Str::ucfirst($req->name) ;
        $role->slug = Str::of(Str::lower($req->name))->slug('-') ;
       $role-> save();

       return back();
    }

//    public function store(Request $req){
//        Role::create([
//           'name' => \request('name'),
//           'slug' => Str::lower(request('name'))
//        ]);
//        return back();
//    }

    public function destroy(Role $role){

        $role ->delete();

        session()->flash('role-delete','Deleted Role has been done successfully' . $role->name);
//
        return back();
    }

    public function edit(Role $role){
        return view('admin.roles.edit' , [
            'role' => $role ,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role ,  RoleRequest $req){
//        Role::update([
//           'name' => Str::ucfirst($req->name),
//           'slug' => Str::of($req->name)->slug('-'),
//        ]);
        $role->name = Str::ucfirst($req->name) ;
        $role->slug = Str::of(Str::lower($req->name))->slug('-') ;

        if($role ->isDirty('name')){
            session()->flash('role-updated' , 'Role has been updated'.$role->name);
        } else{
            session()->flash('role-not-updated' , 'Nothing to Update at all');
        }

        return back();
    }

    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
        //we bring that permission name from hidden input
    }

    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }


}
