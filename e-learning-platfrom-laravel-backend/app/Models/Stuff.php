<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $primaryKey = 's_id'; //if we create name without convention
    public $timestamps = false;
}