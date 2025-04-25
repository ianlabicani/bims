@extends('shell')

@section('content')

    @include('guest._ui.navbar')
    @yield('guest-content')
@endsection