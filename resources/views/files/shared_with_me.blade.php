@extends('layouts.app')

@section('content')
    <h1>Files Shared With Me</h1>
    <ul>
        @foreach ($files as $file)
            <li>{{ $file->filename }} - Shared by {{ $file->user->name }}</li>
        @endforeach
    </ul>
@endsection
