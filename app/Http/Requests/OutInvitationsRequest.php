<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutInvitationsRequest extends FormRequest
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
            'nickname'=>['required'],
            'name'=>'required|string|unique:invitations,name,'.$this->invitation->id,
            'email'=>['required','string'],
            'mobile'=>['required','string'],
            'orgnisation'=>['required','string'],
            'position'=>['required','string'],
        ];
    }
}
