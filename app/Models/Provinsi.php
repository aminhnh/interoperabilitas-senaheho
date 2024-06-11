<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
    ];
        /**
     * Scope a query to only include provinsi that match the given filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $q
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByQuery($q, array $filters)
    {
        if (isset($filters['id'])) {
            $q->where('id', $filters['id']);
        }
        if (isset($filters['nama'])) {
            $q->where('nama', 'like', '%' . $filters['nama'] . '%');
        }
        if (isset($filters['id_kota'])) {
            $q->whereHas('kotas', function ($query) use ($filters) {
                $query->where('id', $filters['id_kota']);
            });
        }
        if (isset($filters['id_kecamatan'])) {
            $q->whereHas('kotas.kecamatans', function ($query) use ($filters) {
                $query->where('id', $filters['id_kecamatan']);
            });
        }
        if (isset($filters['id_kelurahan'])) {
            $q->whereHas('kotas.kecamatans.kelurahans', function ($query) use ($filters) {
                $query->where('id', $filters['id_kelurahan']);
            });
        }
        return $q;
    }

    public function kotas()
    {
        return $this->hasMany(Kota::class, 'id_provinsi', 'id');
    }}
