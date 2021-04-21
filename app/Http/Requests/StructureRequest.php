<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StructureRequest extends FormRequest {

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
            'responsable' => 'required|string',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'specialite' => 'required|string',           
        ];
    }

}
