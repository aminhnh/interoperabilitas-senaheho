<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_kota',
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
        if (isset($filters['id_kota'])) {
            $q->where('id_kota', $filters['id_kota']);
        }
        return $q;
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    }

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan', 'id');
    }}
