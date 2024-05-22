<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KantongDarahResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tanggal_diperoleh' => $this->tanggal_donor,
            'tanggal_kadaluarsa' => $this->tanggal_kadaluarsa,
            'jumlah' => $this->jumlah,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'golongan_darah' => new GolonganDarahResource($this->golonganDarah),
            'lembaga' => new LembagaResource($this->lembaga),
        ];
    }
}
