<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Team;
use Inertia\Inertia;
use Inertia\Response;

class TeamController extends Controller
{
    public function show(Int $id, Request $request)
    {
        $team = Team::where('id', $id)->first();

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
}
