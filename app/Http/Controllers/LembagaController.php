<?php

namespace App\Http\Controllers;

use App\Http\Resources\LembagaResource;
use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listLembaga = Lembaga::all()->load(['kelurahan', 'role']);
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data lembaga.',
            'data' => LembagaResource::collection($listLembaga),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
