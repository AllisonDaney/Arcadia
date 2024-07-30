<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        'password'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'firstname.required' => 'Le prénom est requis.',
          'lastname.required' => 'Le nom est requis.',
          'username.required' => 'Le mail est requis.',
          'password.required' => 'Le mot de passe est requis.',
      ];
  }
}