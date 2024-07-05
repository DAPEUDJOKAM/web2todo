@extends('layouts.admin.app')

@section('title', 'Ubah Catatan')

@section('content')
<form method="POST" action="/todo/update/{{$todo->id}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <input type="text" class="form-control" id="description" name="description" value="{{$todo->description}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
