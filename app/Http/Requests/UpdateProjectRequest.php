<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'category_id' => ['required', 'exists:categories,id'],

            'title' => ['required', 'string', 'max:255'],

            'description' => ['required', 'string'],

            'version' => ['required', 'string', 'max:50'],

            'year' => ['required', 'digits:4'],

            'github_url' => ['nullable', 'url'],

            'demo_url' => ['nullable', 'url'],

            // Pada update tidak wajib upload lagi
            'thumbnails' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'file_project' => [
                'nullable',
                'file',
                'mimes:zip',
                'max:51200',
            ],

            'screenshots' => [
                'nullable',
                'array',
            ],

            'screenshots.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ];
    }
}