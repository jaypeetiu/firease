<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationUser extends Model
{
    use HasFactory;
    
    protected $table = "station_user";

    public function posts()
    {
        return $this->hasMany(Post::class, 'station_id', 'station_id');
    }

    public function user()
    {
        return $this->hasOne(Post::class, 'station_id', 'station_id');
    }
}
