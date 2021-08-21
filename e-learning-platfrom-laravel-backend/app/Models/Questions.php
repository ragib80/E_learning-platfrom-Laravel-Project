<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{ 
    protected $fillable=['quizes_id','c_id','question','answer','status','options','note'];

    public function optionsdata()
    {
    	return $this->hasMany(Options::class)->inRandomOrder();
    }
     public function quizes()
    {
    	return $this->belongsTo(Quizes::class);
    }
}
