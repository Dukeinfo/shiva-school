<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetaDetail extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking

    protected $guarded = [];
}
