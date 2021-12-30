<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Post;
use Illuminate\Support\Str;

/**
 * @method static findOrFail(int $id)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username' , 'avatar','is_active', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($val){
       if(!empty($val)){
           $this->attributes['password'] = bcrypt($val);

       }
    }

    public function posts(){
        return $this-> hasMany(Post::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

//     public function role(){
//        return $this-> belongsTo(Role::class);
//     }

//    public function role(){
//        return $this->belongsToMany(Role::class);
//    }

    public function permissions(){
        return $this-> belongsToMany(Permission::class);
    }

    public function userHasRole($role_name){
        foreach ($this->roles as $role){
            if(Str::lower($role_name) == Str::lower($role_name))
                return true ;
        }
        return false ;
    }
    public function getAvatarAttribute($val){
        return asset($val);
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

//    public function isAdmin(){
//
//        if($this-> role-> name == "administrator"){
//            return true;
//        }
//        return false ;
//
//    }


//    public function userHasRoles(...$role_name){
//        if (is_array());
//    }
}
