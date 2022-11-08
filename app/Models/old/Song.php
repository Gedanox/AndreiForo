<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    protected $table = 'song';
    
	protected $fillable = ['title','idPlayer','duration','genre','idAlbum','order','date'];
	
	public function album(){
		return $this->belongsTo('App\Models\Album', 'idAlbum');
	}
	
	public function player(){
		return $this->belongsTo('App\Models\Player', 'idPlayer');
	}
}
