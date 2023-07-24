<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title"=> ["required", "min:8"],
            "slug"=>['required', "min:8", "regex:/^[0-9a-z\-]+$/", Rule::unique('posts')->ignore($this->route()->parameter("post"))],
            "content"=> ["required"],
            "tags"=> ["array","exists:tags,id"]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'slug'=> $this->input('slug') ?: Str::slug($this->input("title")),
        ]);

    }
}
