<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable = [ 'description', 'document_type', 'upload_date', 'verification_date', 'authorization', 'users_data_id', 'user_id', ];
}
