<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamUser extends Model
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

    /**
     * Display user
     *
     * @return BelongsTo<User, TeamUser>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
