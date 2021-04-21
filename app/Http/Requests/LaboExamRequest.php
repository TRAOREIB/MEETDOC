<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboExamRequest extends FormRequest {

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
            'idlabo' => 'required|string',
            'idexamen' => 'required|string',
            'heuredebut' => 'required',
            'heurefin' => 'required',
            'joursexam' => 'required',
            'prix' => 'required|string'
        ];
    }

}
