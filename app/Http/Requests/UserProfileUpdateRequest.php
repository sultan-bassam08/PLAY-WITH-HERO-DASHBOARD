<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all authenticated users to update their profile
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:15', // Name must be between 5 and 15 characters
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'phone' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'bio' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048',
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 5 characters.',
            'name.max' => 'The name must not exceed 15 characters.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already in use.',
            'phone.max' => 'The phone number must not exceed 10 characters.',
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.max' => 'The profile picture must not exceed 2MB.',
        ];
    }
}