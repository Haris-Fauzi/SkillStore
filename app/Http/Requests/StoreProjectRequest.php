<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],

            'title' => ['required', 'string', 'max:255'],

            'description' => ['nullable', 'string'],

            'version' => [
                'required',
                'regex:/^\d+\.\d+\.\d+$/',
            ],

            'github_url' => ['nullable', 'url'],

            'demo_url' => ['nullable', 'url'],

            'year' => ['nullable', 'digits:4'],

            'thumbnails' => [
                'nullable',
                'image',
                'max:2048',
            ],

            'file_project' => [
                'nullable',
                'file',
                'max:10240', // 10 MB
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

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',

            'title.required' => 'Judul project wajib diisi.',

            'version.regex' => 'Format versi harus seperti 1.0.0',

            'github_url.url' => 'Format URL GitHub tidak valid.',

            'demo_url.url' => 'Format URL Demo tidak valid.',

            'year.digits' => 'Tahun harus terdiri dari 4 digit.',

            'thumbnails.image' => 'Thumbnails harus berupa gambar.',

            'thumbnails.max' => 'Ukuran thumbnails maksimal 2 MB.',

            'file_project.max' => 'Ukuran file project maksimal 10 MB.',
        ];
    }
}
