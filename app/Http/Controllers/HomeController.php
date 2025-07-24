<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Team;
use App\Models\TeamUser;
use Inertia\Response;

class HomeController extends Controller
{
    public function show(Request $request): Response 
    {
        $current = $request->user();

        $userTeams = Team::where('user_id', $current->id)->get();

        $teams = TeamUser::where('user_id', $current->id)->with('team')->get();

        return Inertia::render('Dashboard', [
            'userTeams' => $userTeams,
            'teams' => $teams,
        ]);
    }
}
