@extends('layouts.index')

@section('content')

<div class="mt-5">
    <form action="{{ route('novels.store') }}" method="POST" enctype="multipart/form-data">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        <div class="mb-3 fw-bolder bg-custom p-2">
            Upload Novel
        </div>
        @csrf

        <div class="form-group pb-2">
            <label for=" image">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>


        <div class="form-group pb-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group pb-2">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group pb-2">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group pb-2">
            <label for="text_file">Text File</label>
            <input type="file" class="form-control" id="text_file" name="text_file" accept=".txt" required>
        </div>

        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
</div>
@endsection