<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackFormRequest extends FormRequest 
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
          'pseudo'=> 'required',
          'content'=> 'required',
          'rating'=> '',
      ];
  }

  public function messages()
  {
      return [
          'pseudo.required' => 'Le pseudo est requis.',
          'content.required' => 'Le contenu est requis.',
      ];
  }
}