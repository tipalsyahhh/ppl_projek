@extends('layout.master')

@section('content')
<div class="container">
    <h1>Create New Status</h1>
    <form action="{{ route('statuses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="caption">Caption:</label>
            <textarea name="caption" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Status</button>
    </form>
</div>
@endsection
