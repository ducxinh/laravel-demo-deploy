<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'user_id' => 'nullable|integer|exists:users,id',
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'description' => 'nullable|string|max:500',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ];
    }
}
