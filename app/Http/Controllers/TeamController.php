<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\TeamService;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class TeamController extends Controller
{
    public function show(Int $id, Request $request)
    {
        $team = Team::where('id', $id)->with('team_users.user')->first();

        if ($team) {
            return Inertia::render('Team/Show', [
                'team' => $team
            ]);
        }

        return back();

    }

    public function createDisplay()
    {
        return Inertia::render('Team/CreateTeam');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $team = Team::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($team) {
            return redirect()->route('team.show', [ 'id' => $team->id ]);
        }

        return back();
    }

    public function addUserByMail(Int $id, Request $request)
    {
        $request->validate([
            'email' => 'email|required'
        ]);

        if ($request->email === $request->user()->email) {
            return back();
        }

        $teamService = new TeamService();

        $result = $teamService->addToTeam($request->email, $id);

        //GERER APRES LES NOTIFS

        if ($result) {
            return back();
        } else {
        }

        dd('BUG, NO ADDED TO TEAM');
    }

    public function removeUsers(Int $id, Request $request)
    {
        /* VALIDATE ARRAY CONTENT */
        $request->validate([
            'list' => 'array'
        ]);

        $removeList = TeamUser::where('team_id', $id)->whereIn('user_id', $request->list)->get();

        foreach ($removeList as $key => $value) {
            $value->delete();
        }
    }
}
