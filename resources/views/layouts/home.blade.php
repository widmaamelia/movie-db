@extends('layouts.header')
@extends('layouts.main')

@section('title', 'Data Home')
@section('navHome', 'active')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }} — Selamat datang, {{ Auth::user()->name }}!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1 class="mb-4 mt-4">Latest Movies</h1>

<div class="row">
    @foreach ($movies as $movie)
        <div class="col-md-6 mb-4"> {{-- 2 kolom per baris --}}
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        @if ($movie->cover_image)
    <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
@else
    <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded-start" alt="No Image">
@endif

                    </div>
                    <div class="col-md-7">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::words($movie->synopsis, 20, '...') }}</p>
                            <p class="card-text">
                                <small class="text-muted">Year: {{ $movie->year }} | Category: {{ $movie->category->name ?? 'Unknown' }}</small>
                            </p>
                            <div class="mt-auto text-end">
                                <a href="{{ route('detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}" class="btn btn-success">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>

@endsection
