<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeCommentFormRequest extends FormRequest 
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
          'home_id'=> 'required',
          'content'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'home_id.required' => 'Le habitat est requis.',
          'content.required' => 'Le commentaire est requis.',
      ];
  }
}