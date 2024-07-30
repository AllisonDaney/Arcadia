<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeterinarianReportFormRequest extends FormRequest 
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
        'animal_id'=> '',
        'animal_condition'=> 'required',
        'food'=> 'required',
        'food_quantity'=> 'required',
        'details'=> 'required',
        'visit_at_date'=> 'required',
        'visit_at_time'=> 'required',
      ];
  }

  public function messages()
  {
      return [
          'animal_condition.required' => 'La condition est requise.',
          'food.required' => 'La nourriture est requise.',
          'food_quantity.required' => 'La quantité de nourriture est requise.',
          'details.required' => 'Les détails sont requis.',
          'visit_at_date.required' => 'La date est requise.',
          'visit_at_time.required' => "L'heure est requise.",
      ];
  }
}