@extends('layouts.auth.auth')

@section('title', 'Register')

@section('content')
<form method="POST" action="/user/register/store">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Register</h1>
    <div class="form-floating">
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan Nama">
      <label for="floatingInput">Nama</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control mb-3" name="email" placeholder="Masukkan Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mb-3" name="password" placeholder="Masukkan Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
  </form>
@endsection
