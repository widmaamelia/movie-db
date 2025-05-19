@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Film Baru</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movie.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover</label>
            <select name="cover_image" id="cover_image" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('cover_image') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach

            </select>
        </div>
        

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
        </div>

        <div class="mb-3">
            <label for="actors" class="form-label">Pemeran</label>
            <input type="text" name="actors" id="actors" class="form-control" value="{{ old('actors') }}">
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea name="synopsis" id="synopsis" rows="4" class="form-control">{{ old('synopsis') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">URL Gambar Cover</label>
            <input type="text" name="cover_image" id="cover_image" class="form-control" value="{{ old('cover_image') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('movie.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
