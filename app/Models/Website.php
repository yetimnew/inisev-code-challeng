<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['url'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // website may have many Subscribers/users
    public function users()
    {
        return $this->belongsToMany(Website::class, 'user_website', 'website_id', 'user_id');
        // return $this->belongsToMany(Website::class);
    }
}
