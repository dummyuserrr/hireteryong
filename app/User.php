<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $fillable = ['verificationstatus'];
	
    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
}
