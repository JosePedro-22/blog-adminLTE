<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __invoke($hash){

        $media = Media::query()->where('hash', $hash)   ->firstOrFail();

        $url = Storage::disk('s3')->temporaryUrl(
            $media->path,
            now()->addHour(),
            ['ResponseContentDisposition' => 'attachment']
        );

        return response()->json(['url' => $url]);
    }
}
