<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class Blogs extends Model
{
    use HasFactory;
    use SoftDeletes;  

    protected $guarded = [];

     public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }

}
