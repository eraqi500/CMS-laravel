<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index' , [
            'permissions' => $permissions
        ]);
    }

    public function store(PermissionRequest $req){
        $req->validated();

        Permission::create([
            'name' => Str::ucfirst($req->name) ,
            'slug' => Str::of(Str::lower($req->name))->slug('-'),
        ]);
        return back();
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit' ,[
            'permission' =>$permission
        ]);
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return back();
    }

    public function update(Permission $per , PermissionRequest $req){
        $per ->name = Str::ucfirst($req->name);
        $per ->slug = Str::of(Str::lower($req->name))->slug('-');

        if($per -> isDirty('name')){
            session()->flash('permission-updated' , 'Role has been updated'.$per->name);
            $per->save();
        } else
        {
            session()->flash('permission-not-updated' , 'Nothing to Update at all');
        }
        return back();

    }




}
