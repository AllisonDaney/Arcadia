<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HourRequestForm extends FormRequest 
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
          'day'=> 'required',
          'opening_time'=> 'required',
          'closing_time'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'day.required' => 'Le jour est requis.',
          'opening_time.required' => "L'heure d'ouverture est requise.",
          'closing_time.required' => "L'heure de fermeture est requise.",
      ];
  }
}