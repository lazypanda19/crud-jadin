@extends('layout.main')
@section('content')
{{-- Content --}}
<div class="container py-4">
    <div>
        <h2 class="text-center">Book Detail</h2>
    </div>
    <div class="py-2">
        <h3>{{ $book->title }}</h3>
        <h5>By {{ $book->author }} - {{ $book->year }}</h5>
        <h6 class="text-secondary">Genre : {{ $book->genre }}</h6>
        <p>{{ $book->description }}</p>
    </div>
</div>
{{-- End Content --}}
@endsection
