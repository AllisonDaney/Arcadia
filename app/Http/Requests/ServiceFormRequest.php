<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceFormRequest extends FormRequest 
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
          'label'=> 'required',
          'content'=> 'required',
          'file'=> '',
          'options'=> '',
      ];
  }

  public function messages()
  {
      return [
          'label.required' => 'Le nom est requis.',
          'content.required' => 'Le contenu est requis.',
      ];
  }
}