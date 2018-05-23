@extends('main')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @include('assets/errors')

    <form method="post">
        {{ csrf_field() }}

        E-mail:<br />
        <input type="text" name="email" autofocus required value="{{ old('email') }}" /><br />
        <br />
        Password:<br />
        <input type="password" name="password" required /><br />
        <br />
        <button type="submit">Login</button>
    </form>
@endsection
