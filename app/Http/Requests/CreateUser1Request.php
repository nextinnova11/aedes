<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUser1Request extends Request
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
            'name'          =>      'required|min:5|max:50',
            'email'         =>      'required|email|max:50|unique:users',
            'password'      =>      'required|AlphaNum|confirmed|Between:5,10',
            'KP'            =>      'required|numeric',
            'telefon'       =>      'required|numeric',
            'telefon'       =>      'required|max:11',
            'noRumah'       =>      'max:10',
            'namaTaman'     =>      'max:30',
            'namaJalan'     =>      'max:30',
            'poskod'        =>      'numeric|Between:0,5',
            'bandar'        =>      'max:20',
            'negeri'        =>      'max:50',
        ];
    }
}
