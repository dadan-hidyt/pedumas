@extends('layouts.app')
@section('content')
    @livewire('petugas.edit-petugas', ['petugas' => $petugas])
@endsection
