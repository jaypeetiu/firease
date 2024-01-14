<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aids extends Model
{
    use HasFactory;

    protected $table = "aids";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'image',
        'title',
        'description',
        'shortdescription'
    ];
}
