<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $primaryKey = 'stf_id'; //if we create name without convention
    public $timestamps = false;
}