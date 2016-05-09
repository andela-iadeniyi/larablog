<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    protected $table = 'biographies';

    protected $fillable = ['user_id', 'biography'];

    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
}
