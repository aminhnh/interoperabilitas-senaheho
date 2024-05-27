<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LembagaUpdateRequest extends FormRequest
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
            'id_role' => 'nullable|exists:role,id',
            'id_kelurahan' => 'nullable|exists:kelurahan,id',
            'jenis' => 'nullable|string',
            'nama' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kode_pos' => 'nullable|string',
            'no_telepon' => 'nullable|string',
        ];
    }
}
