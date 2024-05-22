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
}
