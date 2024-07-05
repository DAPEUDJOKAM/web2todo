@extends('layouts.admin.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pengguna</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
