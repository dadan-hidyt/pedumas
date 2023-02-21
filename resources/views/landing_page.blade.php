@extends('layouts.app')

@section('content')
    <div class="bg-white border shadow p-5">
        <b class="page-logo-text mr-1">{{ config('app.name') }}</b>
    </div>
    <div class="page-wrapper">
        <div class="page-inner bg-white">
            <div class="page-content bg-transparent m-0">
                <div class="flex-1"
                    style="background: url({{ asset('assets/pattern.svg') }}) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col col-md-6 col-lg-7">
                                <h2 class="fs-xl fw-500 mt-4 text-white">
                                    Selamat Datang
                                    {{ auth()->guard('petugas')->user()->nama_petugas ??(auth()->guard('masyarakat')->user()->username ??'') }}
                                    di Website {{ config('app.name') }}! Kami senang bisa melayani dan mendengar masalah
                                    yang anda hadapi.
                                    <small class="h5 fw-300 mt-3 mb-5 text-white opacity-60">
                                        Website pengaduan masyarakat adalah platform daring yang ditujukan untuk
                                        memfasilitasi masyarakat dalam mengajukan keluhan, pengaduan, ataupun saran terkait
                                        masalah yang dialami. Website ini bertujuan untuk mempermudah proses pengaduan dan
                                        memastikan bahwa setiap masalah yang disampaikan akan diterima dan ditindaklanjuti
                                        oleh pihak yang berwajib.
                                    </small>
                                </h2>

                                @if (auth()->guard('petugas')->check())
                                    <a class="btn btn-primary" href="{{ route('petugas.dashboard') }}">Dashboard Petugas</a>
                                @elseif (auth()->guard('masyarakat')->check())
                                    <a class="btn btn-primary" href="{{ route('masyarakat.dashboard') }}">Dashboard
                                        Petugas</a>
                                @else
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <a class="btn btn-block btn-primary" href="{{ route('login') }}">Login Admin &
                                                Petugas</a>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <a class="btn btn-block btn-danger" href="{{ route('daftar') }}">Daftar
                                                Masyarakat</a>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <a class="btn btn-block btn-success" href="{{ route('petugas.daftar') }}">Daftar
                                                Petugas</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col d-md-none d-none d-lg-block  col-md-6 col-lg-5">
                                <img src="{{ asset('assets/newlogo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2023 © Dadan Hidayat
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
