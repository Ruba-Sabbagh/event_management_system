<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_name'=> 'required|unique:Programs|max:255',
            'program_name_ar'=> 'required|unique:Programs|max:255',
            'program_code'=> 'required|unique:Programs|max:255',
            'desc'=> 'nullable',
        ];
    }
}
