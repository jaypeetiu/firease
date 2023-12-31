<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message' => ['string'],
            'user_id' => ['required','string'],
            'fire_type' => ['string'],
            'image' => ['string'],
            'vehicle_id' => ['required'],
            'station_id' => ['required'],
        ];
    }
}
