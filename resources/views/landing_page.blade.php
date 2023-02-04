@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ route('login') }}">LOGIN</a>
    <a class="btn btn-primary" href="{{ route('daftar') }}">Daftar Masyarakat</a>
    <a class="btn btn-primary" href="{{ route('petugas.daftar') }}">Daftar Admin</a>
</div>
@endsection