<?php

namespace App\Http\Requests;

use App\Enums\Category;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
        $contentExist = function($attr, $val, $fail) {
            $category_id = $this->all()['category_id'];

            switch ($category_id) {
            case Category::Image:
                if (! Image::where('id', $val)->exists()) {
                    $fail('Imageid :attribute not found.');
                }
                break;
            case Category::Video:
                if (! Video::where('id', $val)->exists()) {
                    $fail('Video not found.');
                }
                break;
            }
        };
        return [
            'comment' => ['required', 'string'],
            'category_id' => ['required', new Enum(Category::class)],
            'content_id' => ['required', $contentExist],
            # 'content_id' => ['required', ],
        ];
    }
}
