<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
	protected $fillable = ['message'];
	
	public function user(){
		return $this->belongsTo('App\Models\User', 'idUser');
	}
	
	public function forum(){
		return $this->belongsTo('App\Models\Forum', 'idForum');
	}
	
	public function comments(){
		return $this->hasMany('App\Models\Comment', 'idComment');
	}
}
