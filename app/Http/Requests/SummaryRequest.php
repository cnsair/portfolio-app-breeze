<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SummaryRequest extends FormRequest
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
            'myname' => 'required|min:2|max:50',
            'position' => 'required|min:2|max:50',
            'biography' => 'required|max:1000',
            'address' => 'required|max:100',
            'phone' => 'required|max:50',
            'email' => 'required|max:100'
        ];
    }
}