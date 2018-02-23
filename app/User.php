<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Presenters\UserPresenter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function isAdmin(){
        return $this->hasRoles(['admin']);
    }


    public function roles(){

        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles){

        foreach ($roles as $role) {

           // dd($this->roles->pluck('name')->intersect($role));
           return  $this->roles->pluck('name')->intersect($role)->count();
        }
    }

    public function messages(){

        return $this->hasMany(Message::class);
    }

    public function note(){

        return $this->morphMany(Note::class, 'notable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    public function present(){
        return new UserPresenter($this);
    }
}
