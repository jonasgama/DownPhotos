<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Imagem;

class User extends Authenticatable
{
    //
    use Notifiable;


     protected $fillable = ['id', 'nome', 'sobrenome', 'email', 'password'];
  
     protected $hidden = [
        'password', 'remember_token',
    ];

    public function files(){


    	return $this->hasMany(Imagem::class); 
    }

}
    