<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description'
    ];

    public function monsters()
    {
  	
	// La taula per seguir convencions Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
       		 Monster::class,
        	'monsters_moves');
       
     }
}