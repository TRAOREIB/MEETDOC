<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoireRequest extends FormRequest {

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
         
            'email' => 'required|email',
            'nom' => 'required|string',
            'telephone' => 'required|numeric|min:8',                  
            'heureouverture' => 'required',
            'heurefermeture' => 'required',
            'joursouvres' => 'required|string'
       ];
    }

    public function messages() {
        return [
          
            'mail.required' => 'le mail est obligatoire'
           
        ];
    }

}
