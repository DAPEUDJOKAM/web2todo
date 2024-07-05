@extends('layouts.auth.auth')

@section('title', 'Login')

@section('content')
@if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
@endif
<form method="POST" action="/user/login/auth">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Login</h1>
    <div class="form-floating">
      <input type="email" class="form-control mb-3" name="email" placeholder="Masukkan Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mb-3" name="password" placeholder="Masukkan Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
  </form>
@endsection
