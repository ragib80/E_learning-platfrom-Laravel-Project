<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    // protected $table = 'user_table';
    protected $primaryKey = 'i_id'; //if we create name without convention
    public $timestamps = false;

    //const CREATED_AT = 'create_time';
    //const UPDATED_AT = 'update_time';
}