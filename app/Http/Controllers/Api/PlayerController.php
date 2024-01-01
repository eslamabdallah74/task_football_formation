<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $players = DB::table('players')->orderBy('id', 'desc')->get();
        return response()->json(['players' => $players]);
    }

    public function store(AddPlayerRequest $request)
    {
        $validatedData = $request->validated();
        Player::create($validatedData);

        return response()->json(['message' => 'Player created successfully']);
    }

    public function show(Player $player)
    {
        return response()->json(['player' => $player]);
    }

    public function update(AddPlayerRequest $request, Player $player)
    {
        $validatedData = $request->validated();
        $player->update($validatedData);

        return response()->json(['message' => 'Player updated successfully']);
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(['message' => 'Player deleted successfully']);
    }
}