<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __invoke($hash){

        $media = Media::query()->where('hash', $hash)->firstOrFail();

        return Storage::response($media->path);
    }
}
