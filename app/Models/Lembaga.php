<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_role',
        'id_kelurahan',
        'jenis',
        'nama',
        'alamat',
        'kode_pos',
        'no_telepon',
    ];

    public function scopeFilterByQuery($q, array $filters) {
        return $q->when(isset($filters['id_provinsi']), function($q) use ($filters) {
            $q->whereHas('kelurahan.kecamatan.kota.provinsi', function($q) use ($filters) {
                $q->where('id', $filters['id_provinsi']);
            });
        })->when(isset($filters['id_kota']), function($q) use ($filters) {
            $q->whereHas('kelurahan.kecamatan.kota', function($q) use ($filters) {
                $q->where('id', $filters['id_kota']);
            });
        })->when(isset($filters['id_kecamatan']), function($q) use ($filters) {
            $q->whereHas('kelurahan.kecamatan', function($q) use ($filters) {
                $q->where('id', $filters['id_kecamatan']);
            });
        })->when(isset($filters['id_kelurahan']), function($q) use ($filters) {
            $q->where('id_kelurahan', $filters['id_kelurahan']);
        })->when(isset($filters['id_role']), function($q) use ($filters) {
            $q->where('id_role', $filters['id_role']);
        })->when(isset($filters['nama']), function($q) use ($filters) {
            $q->where('nama', 'like', '%'.$filters['nama'].'%');
        })->when(isset($filters['jenis']), function($q) use ($filters) {
            $q->where('jenis', 'like', '%'.$filters['jenis'].'%');
        })->when(isset($filters['alamat']), function($q) use ($filters) {
            $q->where('alamat', 'like', '%'.$filters['alamat'].'%');
        })->when(isset($filters['kode_pos']), function($q) use ($filters) {
            $q->where('kode_pos', 'like', '%'.$filters['kode_pos'].'%');
        })->when(isset($filters['no_telepon']), function($q) use ($filters) {
            $q->where('no_telepon', 'like', '%'.$filters['no_telepon'].'%');
        })->orderBy($filters['sort_by'] ?? 'id', $filters['sort_direction'] ?? 'ASC');
    } 

    public function role() {
        return $this->hasOne(Role::class, 'id', 'id_role');
    }

    public function kelurahan() {
        return $this->hasOne(Kelurahan::class, 'id', 'id_kelurahan');
    }
}
