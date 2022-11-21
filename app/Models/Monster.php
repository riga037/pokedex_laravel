<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;
    protected $fillable = ['monstername','category','description','type_id'];

    protected $with = ['type'];

    public function type() {

    	return $this->belongsTo(Type::class);

        // return $this->belongsTo(Model::class, 'foreign_key', 'owner_key');

    }

    public function moves()
    {
  	
	// La taula per seguir convencions Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
       		 Move::class,
        	'monsters_moves');
       
     }
}
