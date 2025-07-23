<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamRoles extends Model
{
    /** @use HasFactory<\Database\Factories\TeamRolesFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'team_roles';

    protected $cast = [
        'team_id' => 'int',
    ];

    protected $fillable = [
        'team_id',
        'role',
    ];
}
