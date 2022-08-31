<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', function ($name, $item, $fail) {
                // もし既に使用されている名前なら弾く(自身以外)
                if (count(User::where([
                        ['name', $item],
                        ['id', '<>', Auth::id()],
                    ])->get())) {
                    $fail('The name is already in use.');
                }
            }],
            'email' => ['required', 'string', 'email', 'max:255', function ($name, $item, $fail) {
                // もし既に使用されているemailなら弾く(自身以外)
                if (count(User::where([
                        ['email', $item],
                        ['id', '<>', Auth::id()]
                    ])->get())) {
                    $fail('The email address is already in use.');
                }
            }],
        ];
    }
}
