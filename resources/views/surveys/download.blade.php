@extends('layouts.main.layout')

@section('content')

    <p>Your file is ready for download</p>
    <a href="{{ route('download', ['path' => $filePath, 'filename' => $fileShortName])  }}" class="btn btn-success">Download File</a>

@endsection