<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
	protected $fillable = ['message','email','birthdate'];
	
	public function user(){
		return $this->belongsTo('App\Models\User', 'idUser');
	}
	
	public function player(){
		return $this->belongsTo('App\Models\Post', 'idPost');
	}
}
