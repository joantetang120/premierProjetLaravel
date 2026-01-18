<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string|min:3',
            'detail'=>'required|string|min:5',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }

      public function messages(): array
    {
        return[
            'name.required'   => 'Le nom est obligatoire.',
            'name.min'        => 'Tu dois avoir un nom supérieur à 3 caractères.',
            'detail.required' => 'Le détail est obligatoire.',
            'detail.min'      => 'Le contenu du champ détail doit avoir au moins 5 caractères.',
            'image.image'=>'ce fichier n\'est pas une image',
            'image.mimes'=>'mauvais format d\'image',
            'image.max'=>'image trop lourde',
        ];
    }
}
