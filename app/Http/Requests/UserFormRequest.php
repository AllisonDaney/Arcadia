<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserFormRequest extends FormRequest 
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
        'role_id'=> '',
        'firstname'=> 'required',
        'lastname'=> 'required',
        'username'=> 'required|email',
        'password'=> ['required', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
      ];
  }

  public function messages()
  {
      return [
          'firstname.required' => 'Le prénom est requis.',
          'lastname.required' => 'Le nom est requis.',
          'username.required' => 'Le mail est requis.',
          'password.required' => 'Le mot de passe est requis.',
          'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
          'password.letters' => 'Le mot de passe doit contenir au moins une lettre.',
          'password.numbers' => 'Le mot de passe doit contenir au moins un chiffre.',
          'password.mixed' => 'Le mot de passe doit contenir au moins une lettre majuscule et une lettre minuscule.',
          'password.symbols' => 'Le mot de passe doit contenir au moins un caractère spécial.',
      ];
  }
}