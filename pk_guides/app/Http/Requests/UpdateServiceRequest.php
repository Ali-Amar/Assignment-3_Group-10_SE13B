<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return User::check() && User::isCurrentUserAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The service name is required.',
            'description.required' => 'The service description is required.',
            'icon.max' => 'The icon must not exceed 50 characters.',
        ];
    }
}