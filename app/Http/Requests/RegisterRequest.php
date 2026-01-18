<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=>"required|string",
            "email"=>"required|email",
            "password"=>"required|min:4|confirmed:password_confirmation",
        ];
    }

    public function messages():array
    {
        return[
          "name.required" => "Le nom est obligatoire",
            "email.required" => "L'email est obligatoire",
            "email.email" => "L'email est invalide",
            "password.required" => "Le mot de passe est obligatoire",
            "password.min" => "Le mot de passe doit contenir minimum 4 characteres",
            "password.confirmed" => "Les mots de passe doivent correspondre",
        ];
    }
}
