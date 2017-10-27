<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    

 	public static function lista(){

		$categorias = categoria::all();

		return $categorias;

 	}
	
}