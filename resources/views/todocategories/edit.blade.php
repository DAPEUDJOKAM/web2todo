@extends('layouts.admin.app')

@section('title', 'Edit Kategori Catatan')

@section('content')
<div class="container mt-4">
    <h2>Edit Kategori Catatan</h2>

    <form action="{{ route('todocategories.update', $todoCategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $todoCategory->category }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('todocategories.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
