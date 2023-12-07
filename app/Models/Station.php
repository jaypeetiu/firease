<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "stations";

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'address',
        'lat',
        'lang',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'station_user', 'user_id');
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
