<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'umur' => 'required|integer',
            'jender' => 'required|string|in:Laki-laki,Perempuan',
            'no_tlp' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'jabatan_id' => 'required|integer|exists:jabatan,id',
            'status_id' => 'required|integer|exists:status,id',
            'pendidikan_id' => 'required|integer|exists:pendidikan,id',
            'tgl_masuk' => 'required|date',
        ];
    }
}
