<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; //import de java
use Illuminate\Database\Eloquent\Model; //import de java

class Persona extends Model
{
    use HasFactory;
    
    protected $table = 'persona';
    public $timestamps = false;
	protected $fillable = ['dni','nombre','apellidos','telefono'];
}