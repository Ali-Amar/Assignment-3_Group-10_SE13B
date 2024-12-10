<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return User::check();
    }

    public function rules(): array
    {
        return [
            'tour_id' => 'required|exists:tours,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'preferred_date' => 'required|date|after:today',
            'message' => 'nullable|string|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'tour_id.required' => 'Please select a tour.',
            'tour_id.exists' => 'The selected tour is invalid.',
            'preferred_date.after' => 'The preferred date must be after today.',
            'phone.required' => 'Please provide a contact number.',
        ];
    }
}