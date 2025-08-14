<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public function uploadAndSave(UploadedFile $file, string $directory): Media
    {
        $disk = config('app.uploads.disk', 'public');
        $path = $file->store($directory, $disk);

        return Media::create([
            'name'        => $file->hashName(),
            'file_name'   => $file->getClientOriginalName(),
            'mime_type'   => $file->getClientMimeType(),
            'path'        => $path, //fix
            'disk'        => $disk,
            'file_hash'   => hash_file(
                config('app.uploads.hash', 'sha256'),
                Storage::disk($disk)->path($path)
            ),
            'collection'  => $directory,
            'size'        => $file->getSize(),
        ]);
    }
}
