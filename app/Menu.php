<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name', 'link', 'description'];
    
    public function content()
    {
    	return $this->hasMany('Blog\Content', 'menu_id');
    }
    
    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
}
