<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // \routes\web でmiddlewareとして実施済み
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string', 'nullable'],
            'file' => ['file', function ($name, $item, $fail) {
                if (is_null($item)){
                    $fail($name . ' is null file. Don\'t upload null file.');
                }
            }],
            'image_url' => ['active_url', 'nullable'],
        ];
    }
}
