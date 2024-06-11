<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinsiResource;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->query();

        $listProvinsi = Provinsi::filterByQuery($query)->get();
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data provinsi.',
            'data' => ProvinsiResource::collection($listProvinsi),
        ], 200);
    }
}
