<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request, File $file = null)
    {
        $request->validate([
            'file' => 'required|file',
            'recipient_id' => 'required|exists:users,id'
        ]);
    
        $newFile = $request->file('file');
        $path = $newFile->store('public/files');
    
        if ($file) {
            // It's an update, create new version
            $newVersion = $file->version + 1;
    
            $newFileRecord = $file->replicate()->fill([
                'filename' => $newFile->getClientOriginalName(),
                'path' => $path,
                'version' => $newVersion,
                'parent_id' => $file->parent_id ?: $file->id
            ]);
    
            $newFileRecord->save();
        } else {
            // It's a new file
            File::create([
                'user_id' => Auth::id(),
                'recipient_id' => $request->recipient_id,
                'filename' => $newFile->getClientOriginalName(),
                'path' => $path,
                'version' => 1
            ]);
        }
    
        return back()->with('success', 'File sent successfully.');
    }

    public function fileVersions(File $file)
{
    $versions = File::where('parent_id', $file->id)
                    ->orWhere('id', $file->id)
                    ->orderBy('version', 'desc')
                    ->get();

    return view('file-versions', compact('versions'));
}

public function uploadVersion(Request $request)
{
    $request->validate([
        'file' => 'required|file',  // ensure a file is uploaded
        'file_id' => 'required|exists:files,id'  // ensure file_id is provided and exists
    ]);

    $originalFile = File::find($request->file_id);
    if (!$originalFile) {
        return back()->with('error', 'Original file not found.');
    }

    $file = $request->file('file');
    $path = $file->store('public/files');

    $newVersion = $originalFile->version + 1;

    // Create a new file entry for the new version
    File::create([
        'user_id' => Auth::id(),
        'recipient_id' => $originalFile->recipient_id,
        'filename' => $file->getClientOriginalName(),
        'path' => $path,
        'version' => $newVersion,
        'parent_id' => $originalFile->parent_id ?: $originalFile->id
    ]);

    return back()->with('success', 'New version uploaded successfully.');
}

    public function download(File $file)
    {
        // Check if the logged-in user is the recipient or the sender
        if (auth()->id() !== $file->recipient_id && auth()->id() !== $file->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Check if file exists before downloading
        if (!Storage::exists($file->path)) {
            abort(404);
        }

        return Storage::download($file->path, $file->filename);
    }
    
    public function index(Request $request)
{
     // Fetch received files
     $receivedFiles = File::where('recipient_id', Auth::id())
     ->orderBy($request->input('sort', 'updated_at'), $request->input('order', 'desc'))
     ->get();

// Fetch sent files
$sentFiles = File::where('user_id', Auth::id())
 ->orderBy($request->input('sort', 'updated_at'), $request->input('order', 'desc'))
 ->get();



    $query = File::query();

    if ($request->has('search')) {
        $query->where('filename', 'like', '%' . $request->search . '%');
    }

    $files = $query->where('recipient_id', Auth::id())
                   ->orderBy($request->input('sort', 'updated_at'), $request->input('order', 'desc'))
                   ->get();

    return view('dashboard', compact('receivedFiles', 'sentFiles','files'));
}
public function showSentFiles()
{
    $sentFiles = File::where('user_id', Auth::id())
                     ->orderBy('updated_at', 'desc')
                     ->get();

    return view('sent-files', compact('sentFiles'));  // Assuming the view file is sent-files.blade.php
}

}