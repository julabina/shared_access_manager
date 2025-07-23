<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamsFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'teams';

    protected $cast = [
        'user_id' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];
}
