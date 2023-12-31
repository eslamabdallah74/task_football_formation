<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPlayerRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:44',
            'position' => 'required|in:forward,midfielder,defender',
            'number' => [
                'required',
                'integer',
                Rule::unique('players', 'number')->ignore($this->route('player')),
                'between:2,99',
            ],
        ];
    }
    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The player name is required.',
            'name.min' => 'The player name must be at least :min characters.',
            'name.max' => 'The player name may not be greater than :max characters.',
            'position.required' => 'The player position is required.',
            'position.in' => 'The selected player position is invalid.',
            'number.required' => 'The player number is required.',
            'number.integer' => 'The player number must be an integer.',
            'number.unique' => 'The player number is already taken.',
            'number.between' => 'The player number must be between :min and :max.',
        ];
    }
}
