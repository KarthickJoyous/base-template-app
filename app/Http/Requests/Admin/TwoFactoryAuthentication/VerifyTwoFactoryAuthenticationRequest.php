<?php

namespace App\Http\Requests\Admin\TwoFactoryAuthentication;

use Illuminate\Foundation\Http\FormRequest;

class VerifyTwoFactoryAuthenticationRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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
            'verification_code' => ['required', 'exists:admins,verification_code,id,'.request()->get('admin')->id]
        ];
    }
}
