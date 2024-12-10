<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'type' => 'required|string|in:scenic,adventure,fun_trip',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The tour name is required.',
            'price.min' => 'The price must be a positive number.',
            'type.in' => 'The selected tour type is invalid.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not be larger than 2MB.',
        ];
    }
}