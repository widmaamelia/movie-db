@extends('layouts.main')

@section('title', 'Data Movie')
@section('navMovie', 'active')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Movie</h1>


        <a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Tambah Movie
        </a>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class=" text-center">
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Year</th>
                        <th>Slug</th>
                        <th>Synopsis</th>
                        <th>Actors</th>
                         <th style="width: 125px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>

                            <td class="text-center">{{ $movie->id }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover" class="img-thumbnail"

                                    style="width: 100px; height: 120px; object-fit: cover;">
                            </td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->category->category_name ?? '-' }}</td>
                            <td class="text-center">{{ $movie->year }}</td>
                            <td>{{ $movie->slug }}</td>
                            <td style="max-width: 250px; white-space: normal;">{{ Str::limit($movie->synopsis, 150) }}</td>
                            <td>{{ $movie->actors }}</td>

                          <td>
    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
         @can('delete')
        <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this movie?')">
            <i class="bi bi-trash-fill"></i> Delete
        </button>
        @endcan
    </form>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $movies->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
