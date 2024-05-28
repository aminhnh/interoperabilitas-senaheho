<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantongDarah extends Model
{
    protected $table = 'kantong_darah';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_golongan_darah',
        'id_lembaga',
        'tanggal_donor',
        'tanggal_kadaluarsa',
        'jumlah',
    ];
    public function scopeFilterByQuery($q, array $filters) {
        return $q->when(isset($filters['jumlah']), function ($q) use ($filters) {
            $q->where('jumlah', $filters['jumlah']);
        })
        ->when(isset($filters['id_kelurahan']), function ($q) use ($filters) {
            $q->whereHas('lembaga', function ($q) use ($filters) {
                $q->where('id_kelurahan', $filters['id_kelurahan'])
                  ->with('kelurahan.kecamatan.kota.provinsi');
            });
        });
    } 

    public function golongan_darah() {
        return $this->hasOne(GolonganDarah::class, 'id', 'id_golongan_darah');
    }
    public function lembaga() {
        return $this->hasOne(Lembaga::class, 'id', 'id_lembaga');
    }
}
