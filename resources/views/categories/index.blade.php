@extends('layouts.main')
@section('title', 'Data Mahasiswa')
@section('navMhs', 'active')

@section('content')
    <div class="container">
        <h1>Daftar Mahasiswa Jurusan TI</h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Input data Mahasiswa</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswas->firstItem() + $loop->index }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama_lengkap }}</td>
                        <td>{{ $mahasiswa->email}}</td>
                        <td>{{ $mahasiswa->tempat_lahir }}</td>
                        <td>{{ $mahasiswa->tgl_lahir }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>{{ $mahasiswa->alamat }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $mahasiswas->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
