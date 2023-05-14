<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class hotelRequest extends FormRequest
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
            //
            'nom_ag'=>'required|min:3',
            'cat'=>'required|min:3',
            'loca'=>'required|min:3',
            'desc'=>'required|min:3',
            'pass'=>'required|min:8',
            'mail'=>'required|email',
        ];

    }
    public function messages()
    {
           return [

               'nom_ag.required' => 'le nom de  l\'hotel est obligatoire',
               'nom_ag.min' => 'le nom de l\'hotel doit avoir au moins 3 caractere',
               'cat.required' => 'la categorie  de  l\'hotel est obligatoire',
               'cat.min' => 'la categorie de l\'hotel doit avoir au moins 3 caractere',
               'loca.required' => 'la localisation est obligatoire',
               'loca.min' => 'la locaisation doit au moins 3 caractere',
               'desc.required' => 'la description est obligatoire',
               'desc.min' => 'la description doit avoir au moins 3 caractere',
               'pass.required' => 'le password est obligatoire',
               'pass.min' => 'le password doit avoir au moins 8 caractere',
               'mail.required' => 'le mail est obligatoire',
               'mail.email' => 'le mail n est pas correcte',

           ];
   }
}
