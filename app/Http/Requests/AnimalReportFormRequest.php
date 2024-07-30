<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalReportFormRequest extends FormRequest 
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
          'animal_id'=> 'required',
          'food'=> 'required',
          'food_quantity'=> 'required',
          'food_at_date'=> 'required',
          'food_at_time'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'animal_id.required' => "L'animal est requis.",
          'food.required' => 'La nourriture est requise.',
          'food_quantity.required' => 'La quantité est requise.',
          'food_at_date.required' => 'La date est requise.',
          'food_at_time.required' => "L'heure est requise.",
      ];
  }
}