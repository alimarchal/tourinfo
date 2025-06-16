<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
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
            'trip_name' => 'nullable|string|max:255',
            'tour_type' => 'nullable|in:Domestic,International',
            'guest_name' => 'nullable|string|max:255',
            'guest_email' => 'nullable|email|max:255',
            'guest_contact' => 'nullable|string|max:255',
            'check_in_date' => 'nullable|date',
            'booking_date' => 'nullable|date',
            'total_cost' => 'nullable|numeric|min:0',
            'total_expenses' => 'nullable|numeric|min:0',
            'profit' => 'nullable|numeric',
            'agent_name' => 'nullable|string|max:255',
            'booking_status' => 'nullable|in:Pending,Booked',
            'path_attachment_create' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ];
    }
}
