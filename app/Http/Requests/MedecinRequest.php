<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedecinRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nom' => 'required|string',
            'email' => 'required|email',
            'prenom' => 'required|string',
            'titre' => 'required|string',
            'anexercice' => 'required|string',      
            'telephone' => 'required|numeric|min:8',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'identifiant' => 'required|string',
            'password' => 'required',
            'confpassword' => 'required'
            ];
    }

}
