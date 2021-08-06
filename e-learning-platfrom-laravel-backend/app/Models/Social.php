<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Social extends Authenticatable
{
    // protected $table = 'user_table';
    // protected $primaryKey = 'i_id'; //if we create name without convention
    public $timestamps = false;

    //const CREATED_AT = 'create_time';
    //const UPDATED_AT = 'update_time';

    protected $fillable = [
        'name', 'email', 'password',
        'avatar', 'provider_id', 'provider',
        'access_token'
    ];

    //You can also use below statement

    protected $guarded = ['*'];
}