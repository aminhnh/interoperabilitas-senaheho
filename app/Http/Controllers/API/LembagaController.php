<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LembagaStoreRequest;
use App\Http\Requests\LembagaUpdateRequest;
use App\Http\Resources\LembagaResource;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LembagaController extends Controller
{
    public function index()
    {
        $query = request()->query();

        $listLembaga = Lembaga::filterByQuery($query)->get()->load('role', 'kelurahan');
        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data lembaga.',
            'data' => LembagaResource::collection($listLembaga),
        ], 200);
    }

    public function store(LembagaStoreRequest $request)
    {
        $validated = $request->validated();

        $lembaga = Lembaga::create($validated);

        return response()->json([
            'status' => '201 Created',
            'message' => 'Berhasil menambah data lembaga.',
            'data' => new LembagaResource($lembaga->load('role', 'kelurahan.kecamatan.kota.provinsi')),
        ], 201);
    }

    public function show(string $id)
    {
        $lembaga = Lembaga::find($id);
        if (is_null($lembaga)) {
            return response()->json([
                'status' => '404 Not Found',
                'message' => 'Data lembaga tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data lembaga.',
            'data' => new LembagaResource($lembaga->load('role', 'kelurahan.kecamatan.kota.provinsi')),
        ], 200);
    }

    public function update(LembagaUpdateRequest $request, Lembaga $lembaga)
    {
        $validated = $request->validated();

        $lembaga->update([
            'id_role' => $validated['id_role'] ?? $lembaga->id_role,
            'id_kelurahan' => $validated['id_kelurahan'] ?? $lembaga->id_kelurahan,
            'jenis' => $validated['jenis'] ?? $lembaga->jenis,
            'nama' => $validated['nama'] ?? $lembaga->nama,
            'alamat' => $validated['alamat'] ?? $lembaga->alamat,
            'kode_pos' => $validated['kode_pos'] ?? $lembaga->kode_pos,
            'no_telepon' => $validated['no_telepon'] ?? $lembaga->no_telepon,
        ]);

        return response()->json([
            'status' => '201 Created',
            'message' => 'Berhasil memperbarui data lembaga.',
            'data' => new LembagaResource($lembaga->load('role', 'kelurahan.kecamatan.kota.provinsi')),
        ], 200);
    }

    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menghapus data lembaga.',
        ], 200);
    }
}
