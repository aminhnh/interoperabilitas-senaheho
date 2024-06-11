<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_provinsi',
        'nama',
    ];

    public function scopeFilterByQuery($q, array $filters)
    {
        if (isset($filters['id'])) {
            $q->where('id', $filters['id']);
        }

        if (isset($filters['nama'])) {
            $q->where('nama', 'like', '%' . $filters['nama'] . '%');
        }

        if (isset($filters['id_provinsi'])) {
            $q->where('id_provinsi', $filters['id_provinsi']);
        }
        return $q;
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class, 'id_kota', 'id');
    }
}
