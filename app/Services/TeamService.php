<?php

namespace App\Services;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Actions\CreateUserAction;

class TeamService
{
    public function addToTeam(String $email,Int $id)
    {
        $team = Team::where('id',$id)->with('team_users')->first();
        $userToAdd = User::where('email', $email)->first();

        if ($userToAdd) {
            $checkIfInCurrentTeam = TeamUser::where('team_id', $id)->where('user_id', $userToAdd->id)->first();

            if ($checkIfInCurrentTeam) {
                return false;
            }
        } else {
            $createUserAction = new CreateUserAction();
            
            $userToAdd = $createUserAction->handle($email);
        }

        TeamUser::create([
            'user_id' => $userToAdd->id,
            'team_id' => $team->id
        ]);   
        
        return true;
    }
}