@extends('layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @include('assets/errors')

    <form method="post">
        {{ csrf_field() }}

        <label for="form_email">E-mail</label>
        <input type="text" name="email" autofocus required value="{{ old('email') }}" /><br />

        <br />

        <label for="form_email">Password</label>
        <input type="password" name="password" required /><br />

        <br />

        <button type="submit" class="action">Login</button>
    </form>
@endsection
