@extends('layouts.main')

@section('content')

   <h2>Detail Movies</h2>
<div class="card">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">Synopsis:</p>
                <p class="card-text">{{$movie->synopsis}}</p>
                <p class="card-text">Actor</p>
                <p class="card-text">{{$movie->actors}}</p>
                <p class="card-text">Kategory: {{ $movie->category->category_name }}</p>
        {{-- <a href="/{{ $movie->id }}/{{ $movie->slug}}" class="btn btn-success">Back</a> --}}
        <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>

      </div>
    </div>
  </div>
</div>
    </div>
@endsection
