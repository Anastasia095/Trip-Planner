<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\FileUploader;

class UploadController
{
    public function __invoke(UploadRequest $request, FileUploader $uploader)
    {
        Gate::authorize('upload-files');

        $media = $uploader->uploadAndSave($request->file('file'), $request->get('collection'));

        return redirect()->back();
    }
}
