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
    public function role() {
        return $this->hasOne(Role::class, 'id', 'id_role');
    }
    public function kelurahan() {
        return $this->hasOne(Kelurahan::class, 'id', 'id_kelurahan');
    }
}
