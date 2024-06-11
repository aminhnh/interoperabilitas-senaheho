<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_kecamatan',
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
        if (isset($filters['id_kecamatan'])) {
            $q->where('id_kecamatan', $filters['id_kecamatan']);
        }
        return $q;
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
}
