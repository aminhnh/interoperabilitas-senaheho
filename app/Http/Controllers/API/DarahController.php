<?PHP
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KantongDarah;
use Illuminate\Support\Facades\Log;

class DarahController extends Controller
{
    public function index(Request $request)
    {
        // $query = KantongDarah::query();

        // if ($request->has('id_golongan_darah')) {
        //     $query->where('id_golongan_darah', $request->id_golongan_darah);
        // }

        // if ($request->has('id_provinsi')) {
        //     $query->whereHas('lembaga.kelurahan.kecamatan.kota', function($q) use ($request) {
        //         $q->where('id_provinsi', $request->id_provinsi);
        //     });
        // }

        // if ($request->has('id_kota')) {
        //     $query->whereHas('lembaga.kelurahan.kecamatan', function($q) use ($request) {
        //         $q->where('id_kota', $request->id_kota);
        //     });
        // }

        // if ($request->has('id_kecamatan')) {
        //     $query->whereHas('lembaga.kelurahan', function($q) use ($request) {
        //         $q->where('id_kecamatan', $request->id_kecamatan);
        //     });
        // }

        // if ($request->has('id_kelurahan')) {
        //     $query->where('id_kelurahan', $request->id_kelurahan);
        // }

        // if ($request->has('id_lembaga')) {
        //     $query->where('id_lembaga', $request->id_lembaga);
        // }

        // if ($request->has('min_jumlah')) {
        //     $query->where('jumlah', '>=', $request->min_jumlah);
        // }

        // if ($request->has('max_jumlah')) {
        //     $query->where('jumlah', '<=', $request->max_jumlah);
        // }

        // $kantongDarah = $query->with(['golongan_darah', 'lembaga'])->get();

        $kantongDarah = KantongDarah::all();
        
        $data = $kantongDarah->map(function($item) {
            Log::info($item->golongan_darah->golongan_darah);
            return [
                'id' => $item->id,
                'tanggal_diperoleh' => $item->tanggal_donor,
                'tanggal_kadaluarsa' => $item->tanggal_kadaluarsa,
                'jumlah' => $item->jumlah,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'golongan_darah' => [
                    'jenis_golongan' => $item->golongan_darah->golongan_darah,
                    'rhesus' => $item->golongan_darah->rhesus,
                ],
                'lembaga' => [  
                    'id' => $item->lembaga->id,
                    'jenis' => $item->lembaga->jenis,
                    'nama' => $item->lembaga->nama,
                    'alamat' => $item->lembaga->alamat,
                    'kode_pos' => $item->lembaga->kode_pos,
                    'no_telepon' => $item->lembaga->no_telepon,
                ],
            ];
        });

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil mengambil data darah',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_golongan_darah' => 'required|integer',
            'id_lembaga' => 'required|string',
            'tanggal_diperoleh' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $darah = KantongDarah::create($validatedData);

        return response()->json([
            'status' => '201 Created',
            'message' => 'Berhasil menambah data darah'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
