<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KantongDarahStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_golongan_darah' => 'nullable|exists:golongan_darah,id',
            'id_lembaga' => 'nullable|exists:lembaga,id',
            'tanggal_donor' => 'nullable|date',
            'tanggal_kadaluarsa' => 'nullable|date|after_or_equal:tanggal_donor',
            'jumlah' => 'nullable|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'id_golongan_darah.exists' => 'ID Golongan Darah yang dipilih tidak valid.',
            'id_lembaga.exists' => 'ID Lembaga yang dipilih tidak valid.',
            'tanggal_donor.date' => 'Tanggal Donor harus dalam format tanggal yang valid.',
            'tanggal_kadaluarsa.date' => 'Tanggal Kadaluarsa harus dalam format tanggal yang valid.',
            'tanggal_kadaluarsa.after_or_equal' => 'Tanggal Kadaluarsa harus setelah atau sama dengan Tanggal Donor.',
            'jumlah.integer' => 'Jumlah harus berupa bilangan bulat.',
            'jumlah.min' => 'Jumlah harus setidaknya :min.',
        ];
        
    }
}
