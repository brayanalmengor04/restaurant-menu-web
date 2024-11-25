<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email,',
            'password' => 'nullable|string|min:8',
            'contact_name' => 'required|string|max:255',
            'restaurant_name' => 'nullable|string|max:255',
           'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_type' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
}
