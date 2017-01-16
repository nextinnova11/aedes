<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSoalanRequest extends Request
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
          'tempat_diperiksa'          => 'required|max:255',
          'soalan_pertama'            => 'required|max:255',
          'soalan_kedua'              => 'required|max:255',
          'soalan_ketiga'             => 'required|max:255',
          'soalan_keempat'            => 'required|max:255',
          'soalan_kelima'             => 'required|max:255',
          'file'                      => 'required',
        ];
    }
}
