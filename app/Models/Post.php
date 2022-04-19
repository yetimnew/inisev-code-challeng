<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['title','description','website_id'];

     public function website()
    {
        return $this->belongsTo(Website::class,'website_id','id');
    }

}
