<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KantongDarahUpdateRequest extends FormRequest
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
            'id_golongan_darah' => 'sometimes|required|exists:golongan_darah,id',
            'id_lembaga' => 'sometimes|required|exists:lembaga,id',
            'tanggal_donor' => 'sometimes|required|date',
            'tanggal_kadaluarsa' => 'sometimes|required|date|after_or_equal:tanggal_donor',
            'jumlah' => 'sometimes|required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'id_golongan_darah.required' => 'The Golongan Darah ID is required.',
            'id_golongan_darah.exists' => 'The selected Golongan Darah ID is invalid.',
        
            'id_lembaga.required' => 'The Lembaga ID is required.',
            'id_lembaga.exists' => 'The selected Lembaga ID is invalid.',
        
            'tanggal_donor.required' => 'The Tanggal Donor field is required.',
            'tanggal_donor.date' => 'The Tanggal Donor must be a valid date.',
        
            'tanggal_kadaluarsa.required' => 'The Tanggal Kadaluarsa field is required.',
            'tanggal_kadaluarsa.date' => 'The Tanggal Kadaluarsa must be a valid date.',
            'tanggal_kadaluarsa.after_or_equal' => 'The Tanggal Kadaluarsa must be after or equal to the Tanggal Donor.',
        
            'jumlah.required' => 'The Jumlah field is required.',
            'jumlah.integer' => 'The Jumlah must be an integer.',
            'jumlah.min' => 'The Jumlah must be at least :min.',
        ];
    }
}
