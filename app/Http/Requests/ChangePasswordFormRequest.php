<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordFormRequest extends FormRequest 
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
          'password'=> ['required', Password::min(8)->letters()->numbers()->mixedCase()->symbols(), 'confirmed'],
          'password_confirmation'=> 'required',
          'reset_token' => '',
      ];
  }

  public function messages()
  {
      return [
          'password.required' => "Le mot de passe est requis.",
          'password.min' => "Le mot de passe doit contenir au moins 8 caractères.",
          'password.letters' => "Le mot de passe doit contenir au moins une lettre.",
          'password.numbers' => "Le mot de passe doit contenir au moins un chiffre.",
          'password.mixed' => "Le mot de passe doit contenir au moins une lettre majuscule ou minuscule.",
          'password.symbols' => "Le mot de passe doit contenir au moins un caractère spécial.",
          'password.confirmed' => "Le mot de passe et la confirmation du mot de passe doivent être identiques.",
          'password_confirmation.required' => "La confirmation du mot de passe est requis.",
      ];
  }
}