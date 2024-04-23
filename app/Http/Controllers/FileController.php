<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'recipient_id' => 'required|exists:users,id'
        ]);

    
        $file = $request->file('file');
        $path = $file->store('public/files');
    
        File::create([
            'user_id' => Auth::id(),
            'recipient_id' => $request->recipient_id,
            'filename' => $file->getClientOriginalName(),
            'path' => $path
        ]);
    
        return back()->with('success', 'File sent successfully.');
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
    $query = File::query();

    if ($request->has('search')) {
        $query->where('filename', 'like', '%' . $request->search . '%');
    }

    $files = $query->where('recipient_id', Auth::id())
                   ->orderBy($request->input('sort', 'updated_at'), $request->input('order', 'desc'))
                   ->get();

    return view('dashboard', compact('files'));
}
}
