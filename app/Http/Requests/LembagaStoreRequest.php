<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LembagaStoreRequest extends FormRequest
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
            'id_role' => 'required|exists:role,id',
            'id_kelurahan' => 'required|exists:kelurahan,id',
            'jenis' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string',
            'no_telepon' => 'required|string',
        ];
    }
}
