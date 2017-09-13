<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Files extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    protected $fillable = ['id', 'nome', 'apelido', 'caminho', 'user_id'];
}
