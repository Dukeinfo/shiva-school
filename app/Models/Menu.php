<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking

    protected $guarded = [];
    public function getSubmenu(){
        return $this->hasMany(Submenu::class);

    }


}
