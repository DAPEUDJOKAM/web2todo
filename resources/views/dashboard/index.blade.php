@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
@if (Auth::check())
            <h1>Welcome, {{ Auth::user()->name }}</h1>

            @if (Auth::user()->group == "user")
                <a href="todo">Todo</a>
            @endif

            <a href="/user/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="/user/logout" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <h1>Welcome, Guest</h1>
            <a href="/user/login">Login</a>
            <a href="/user/register">Register</a>
        @endif
@endsection
