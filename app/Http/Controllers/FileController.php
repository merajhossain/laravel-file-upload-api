<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        Log::info('Upload function started');
        $uploadsPath = 'public/uploads';
        if (!Storage::exists($uploadsPath)) {
            Storage::makeDirectory($uploadsPath);
        }
        try {
            $files = $request->file('files');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('/public/uploads', $filename, 'local');
                File::create([
                    'name' => $filename,
                    'path' => str_replace('public', 'storage', $path),
                ]);
            }
        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            return response()->json(['error' => 'File upload failed'], 500);
        }

        Log::info('Upload function completed successfully');
        return response()->json(['message' => 'Files uploaded successfully']);
    }
}
