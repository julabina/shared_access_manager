<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * display all team members
     *
     * @return hasMany<TeamUser>
     */
    public function team_users()
    {
        return $this->hasMany(TeamUser::class);
    }
}
