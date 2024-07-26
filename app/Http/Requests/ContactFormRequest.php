<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest 
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
          'email'=> 'required|email',
          'content'=> 'required',
          'subject'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'email.required' => 'Le mail est requis.',
          'email.email' => 'Le mail doit être un email valide.',
          'content.required' => 'Le contenu est requis.',
          'subject.required' => 'Le sujet est requis.',
      ];
  }
}