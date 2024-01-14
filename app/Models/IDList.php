<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IDList extends Model
{
    use HasFactory;

    protected $table = "id_lists";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
    ];
}
