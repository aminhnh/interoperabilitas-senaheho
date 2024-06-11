<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KecamatanResource;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->query();

        $listKecamatan = Kecamatan::filterByQuery($query)->get();
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data kecamatan.',
            'data' => KecamatanResource::collection($listKecamatan),
        ], 200);
    }
}
