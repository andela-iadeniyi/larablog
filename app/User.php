<?php

namespace Blog;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function menu()
    {
    	return $this->hasMany('Blog\Menu', 'user_id');
    }
    
    public function content()
    {
    	return $this->hasMany('Blog\Content', 'user_id');
    }

    public function biography()
    {
        return $this->hasOne('Blog\Biography', 'user_id');
    }

    public function avatar()
    {
        return $this->hasOne('Blog\Avatar', 'user_id');
    }

    public function userDetails()
    {
        return User::whereId(Auth::user()->id)->first();
    }
}
