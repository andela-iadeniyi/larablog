<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatars';

    protected $fillable = ['user_id', 'avatar'];

    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
}
