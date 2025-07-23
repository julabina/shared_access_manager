<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamUsers extends Model
{
    /** @use HasFactory<\Database\Factories\TeamUsersFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'team_users';

    protected $cast = [
        'user_id' => 'int',
        'team_id' => 'int',
        'team_role_id' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'team_id',
        'team_role_id',
    ];
}
