<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelurahanResource;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->query();

        $listKelurahan = Kelurahan::filterByQuery($query)->get();
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data kelurahan.',
            'data' => KelurahanResource::collection($listKelurahan),
        ], 200);
    }
}
