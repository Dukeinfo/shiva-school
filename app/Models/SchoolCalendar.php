<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SchoolCalendar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    // protected $date = 'd-m-Y'; 

}
