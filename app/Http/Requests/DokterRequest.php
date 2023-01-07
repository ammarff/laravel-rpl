<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_dokter' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:25'],
            'telp' => ['required','string','max:25'],
            'NIK'=>['required','string','max:25'],
            'no_STR'=>['required','string','max:25'],
            'no_SIP'=>['required','string','max:25'],
            'tanggal_lahir'=>['required','date'],
            'rumah_sakit'=>['required','string','max:25']
        ];
    }
    
}
