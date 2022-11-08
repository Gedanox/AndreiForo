<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; //import de java
use Illuminate\Database\Eloquent\Model; //import de java

class Bike extends Model
{
    use HasFactory;
    
    //La tabla por defecto se le añade una S al final, quedaria en Bikes, por lo tanto ejecutamos la siguiente instruccion.
    //protected $table = 'bike';
    
    //No voy a usar marcas de tiempo;
    public $timestamps = false;
	
	protected $fillable = ['name'];
}