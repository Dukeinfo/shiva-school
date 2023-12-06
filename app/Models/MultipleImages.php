<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MultipleImages extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function whyus()
    {
        return $this->belongsTo(Whyus::class);
    }
}
