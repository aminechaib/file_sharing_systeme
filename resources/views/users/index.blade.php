@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Send File to User</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - <a href="{{ route('file.send', $user->id) }}">Send File</a></li>
        @endforeach
    </ul>
</div>
@endsection
