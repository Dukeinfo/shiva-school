<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
class PageHeading extends Model
{
    use HasFactory;

       public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu_id','id');
    }
}
