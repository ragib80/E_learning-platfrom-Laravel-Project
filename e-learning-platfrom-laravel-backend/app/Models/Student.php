<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;



class Student extends Model
{
    use Sortable;
    // protected $table = 'user_table';
    protected $primaryKey = 'st_id'; //if we create name without convention
    public $timestamps = false;


    /**
     * The table associated with the model.
     *
     * @var string
     */

    public $sortable = [
        'fullname',
        'email',
        'address'
    ];


}