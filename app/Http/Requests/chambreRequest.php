<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chambreRequest extends FormRequest
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
            'cat'=>'required|min:3',
            'type'=>'required|min:3',
            'desc'=>'required|min:3',
            //'desc'=>'required|min:3',
        ];
    }
    public function messages()
    {
           return [

               'cat.required' => 'le nom_de l agence est obligatoire',
               'cat.min' => 'le nom de l agence doit avoir au moins 3 caractere',
               'type.required' => 'la localisatio est obligatoire',
               'type.min' => 'la locaisation doit au moins 3 caractere',
               'desc.required' => 'la description est obligatoire',
               'desc.min' => 'la description doit avoir au moins 3 caractere',
               //'prix.required' => 'la description est obligatoire',
               //'prix.min' => 'la description doit avoir au moins 3 caractere',


           ];
   }
}
