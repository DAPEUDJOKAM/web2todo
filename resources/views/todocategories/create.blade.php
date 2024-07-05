@extends('layouts.admin.app')

@section('title', 'Tambah Kategori Catatan')

@section('content')
<div class="container mt-4">
    <h2>Tambah Kategori Catatan</h2>

    <form action="{{ route('todocategories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('todocategories.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
