<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fire extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'time',
        'type',
        'address',
        'arrival',
        'fire_end',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
