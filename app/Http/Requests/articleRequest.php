<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class articleRequest extends FormRequest
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
            'nom'=>'required|min:3',
            'mail'=>'required|email',
        ];
    }
    public function messages()
{
    return [

        'nom.required' => 'le nom est obligatoire',
        'nom.min' => 'le nom doit avoir au moins 3 caractere',
        'mail.required' => 'le mail est obligatoire',
        'mail.email' => 'le mail n est pas correcte',

    ];
}

}
