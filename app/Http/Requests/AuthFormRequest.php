<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormRequest extends FormRequest 
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
          'username'=> 'required|email',
          'password'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'username.required' => "Le nom d'utilisateur est requis.",
          'username.email' => "Le nom d'utilisateur doit être un email valide.",
          'password.required' => 'Le mot de passe est requis.',
      ];
  }
}