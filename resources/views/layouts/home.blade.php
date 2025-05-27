@extends('layouts.main')
@section('title', 'Data Home')
@section('navHome','active')

@section('content')

<h1 class="mt-5">Sticky footer with fixed navbar</h1>
<div class="row">
    @foreach ($movies as $movie)

    <div class="col-lg-6">
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/' . $movie->cover_image) }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">

    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $movie->title}}</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        {{-- <p class="card-text">Synopsis</p> --}}
        {{-- <p class="card-text">{{ $movie->year }}</p>
        <p class="card-text">Year : {{ $movie->year }}</p>
        <p class="card-text">Category : {{ $movie->category_id }}</p>
        <p class="card-text">Actors : {{ $movie->actors }}</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> --}}
        <a href="/detailmovie/{{ $movie->id }}/{{ $movie->slug}}" class="btn btn-success">Read More</a>
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
