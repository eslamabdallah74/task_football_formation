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
}
