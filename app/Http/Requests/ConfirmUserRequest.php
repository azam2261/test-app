<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmUserRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'mobile' => ['bail', 'required', 'numeric', 'regex:/^(\+98|0098|98|0)?9\d{9}$/', 'digits:11'],
            'code' => ['bail', 'required', 'numeric', 'digits:6']
        ];
    }
}
