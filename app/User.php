<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
   const LIMIT_PAGE = 5;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission','users_permissions');
    }

    public function hasRole( ... $roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    public function isRoot() {

        if ($this->roles->contains('slug', 'root')){
            return true;
        }
        return false;
    }
    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->isRoot();
    }

    public function hasPermissionThroughRole($permission) {
        $a = Permission::where('name',$permission)->first();
        foreach ($a->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
}