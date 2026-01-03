<?php

namespace Modules\ClassRoom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array{class_name: string}
     */
    public function rules(): array
    {
        return [
            'class_name' => 'required|min:1|max:10',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
