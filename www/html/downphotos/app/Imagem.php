<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Imagem extends Model
{
    //
     public function user(){
    	
    	return $this->belongsTo(User::class);
    }

    protected $fillable = ['id', 'nome', 'apelido', 'valor', 'descricao', 'caminho', 'user_id'];
}
