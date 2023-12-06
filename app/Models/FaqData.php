<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqData extends Model
{
    use HasFactory;
    protected $guarded = [];
   

    public function getfaqcat(){
        
        return $this->belongsTo(Footersnippets::class);

    }
}
