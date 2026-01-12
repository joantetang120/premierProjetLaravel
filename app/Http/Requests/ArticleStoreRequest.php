<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'titre' => 'required|min:5',
            'contenu' => 'required|max:20',
            'autheur' => 'required|max:10',
        ];
    }

    public function  messages()
    {
        return [
            'titre.required' => 'Le titre est requis !',
            'titre.min' => 'Le titre doit avoir minimum 5 characters',
            'contenu.required' => 'Le contenu est requis !',
            'autheur.required' => "L'auteur est requis !",
            'autheur.max' => 'L\'auteur doit avoir maximum 10 characters',

        ];
    }
}
