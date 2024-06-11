<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KotaResource;
use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->query();

        $listKota = Kota::filterByQuery($query)->get();
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data kota.',
            'data' => KotaResource::collection($listKota),
        ], 200);
    }
}
