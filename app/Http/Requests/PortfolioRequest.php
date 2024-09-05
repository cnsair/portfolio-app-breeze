<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'name' => 'required|max:50',
            'project' => 'required|max:10',
            'web_address' => 'max:40',
            'description' => 'max:200',
            'file' => 'mimes:jpg,jpeg,png,pdf|max:4048'
        ];
    }
}
