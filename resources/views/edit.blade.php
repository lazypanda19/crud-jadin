@extends('layout.main')
@section('content')
{{-- Content --}}
<div class="container py-4">
    <div>
        <h2 class="text-center">Edit Book</h2>
    </div>
    <div class="py-2">
        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mb-3">
                <label for="title" class="col-lg-2">Book Title</label>
                <div class="col-lg-10">
                    <div>
                        <input class="form-control" type="text" id="title" name="title" value="{{ $book->title }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="author" class="col-lg-2">Author</label>
                <div class="col-lg-10">
                    <div>
                        <input class="form-control" type="text" id="author" name="author" value="{{ $book->title }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="genre" class="col-lg-2">Genre</label>
                <div class="col-lg-10">
                    <div>
                        <input class="form-control" type="text" id="genre" name="genre" value="{{ $book->genre }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="year" class="col-lg-2">Release Year</label>
                <div class="col-lg-10">
                    <div>
                        <input class="form-control" type="number" id="year" name="year" value="{{ $book->year }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="rating" class="col-lg-2">Rating</label>
                <div class="col-lg-10">
                    <div>
                        <input class="form-control" type="number" id="rating" name="rating" step="1" min="0" max="10" value="{{ $book->rating }}">
                    </div>
                </div>
            </div>
            <div>
                <label for="description" class="form-label">Synopsis</label>
                <textarea class="form-control" name="description" id="description" cols="25" rows="5">{{ $book->description }}</textarea>
            </div>
            <div class="py-3 text-end">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- End Content --}}
@endsection
