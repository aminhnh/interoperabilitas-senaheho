<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
}
