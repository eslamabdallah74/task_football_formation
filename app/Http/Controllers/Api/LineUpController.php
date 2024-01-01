<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $line_ups = DB::table('line_ups')->orderBy('id', 'desc')->get();
        return response()->json(['lineups' => $line_ups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}