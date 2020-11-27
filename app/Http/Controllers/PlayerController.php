<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        return PlayerResource::collection($team->players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ]);

        $player = $team->players()->create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ]);

        return new PlayerResource($player);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Player $player)
    {
        if (!$team->players->contains($player))
            return response()->json(['error' => "Player doesn't exist in this team."]);

        return new PlayerResource($player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Player $player)
    {
        if (!$team->players->contains($player))
        {
            return response()->json(['error' => "Player doesn't exist in this team."]);
        }

        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ]);

        $player->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ]);

        return new PlayerResource($player);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Player $player)
    {
        //
    }
}
