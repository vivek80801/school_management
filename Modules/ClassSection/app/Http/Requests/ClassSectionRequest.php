<?php

namespace Modules\ClassSection\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array{name: string}
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:3',
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
