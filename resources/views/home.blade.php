@extends('layout.main')

@section('content')
{{-- Content --}}
<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div>
        <h2 class="text-center">Simple CRUD</h2>
    </div>
    <div class="py-2">
        <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
    </div>
    <div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->rating }} / 10</td>
                    <td>
                        <div class="d-flex">
                            <div class="me-1">
                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-secondary">👁</a>
                            </div>
                            <div class="me-1">
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">✏</a>
                            </div>
                            <div>
                                <form action="{{ route('book.destroy', $book->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                      🚮
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- End Content --}}
@endsection
