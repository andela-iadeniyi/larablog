<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['user_id', 'menu_id', 'title', 'decription', 'content', 'image'];
    
    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
    
    public function menu()
    {
    	return $this->belongsTo('Blog\Menu');
    }
}