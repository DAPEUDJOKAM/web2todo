@extends('layouts.admin.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container mt-4">
    <h2>Edit Pengguna</h2>

    <form action="{{ url('user/update/' . $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password <small>(Kosongkan jika tidak ingin mengubah)</small></label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
