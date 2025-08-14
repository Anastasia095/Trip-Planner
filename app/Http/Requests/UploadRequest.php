<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UploadRequest extends FormRequest
{
    public function authorize()
    {
        return true; // todo
    }

    public function rules()
    {
        return [
            'file' => [
                'required',
                File::types(['pdf'])
                    ->max(5 * 1024), // Max size in KB
            ]
        ];
    }
}
