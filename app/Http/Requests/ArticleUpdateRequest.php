<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'titre' => 'required|',
            'contenu' => 'required|',
            'autheur' => 'nullable|',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le titre est requis !',
            'titre.min' => 'Le titre doit avoir minimum 5 characters',
            'contenu.required' => 'Le contenu est requis !',
            'autheur.required' => "L'auteur est requis !",
            'autheur.max' => 'L\'auteur doit avoir maximum 10 characters',
            'image.image' => 'Le fichier n\'est pas une image !',
            'image.mimes' => 'Le fichier n\'est pas du bon type !',
            'image.max' => 'La taille maximale de l\'image doit etre de  2 mb !',
        ];
    }
}
