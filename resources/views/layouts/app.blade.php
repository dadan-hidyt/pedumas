<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="root-text-sm">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>
        @if (isset($title))
            {{ $title }} - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/app.bundle.css">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('assets') }}/css/datagrid/datatables/datatables.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/img/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/logo.png">
    <link rel="mask-icon" href="{{ asset('assets') }}/img/logo.png" color="#5bbad5">
    <meta name="environment" content="">
    <meta name="author" content="Andry Hidayat">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/markdown.css">
    <link rel="stylesheet" media="all" href="{{ asset('assets/css/custome.css') }}">
    @livewireStyles
</head>

<body
    class="mod-bg-1 mod-main-boxed mod-clean-pages mod-nav-link  mod-skin-dark header-function-fixed  nav-function-fixed">
    @guest
        @yield('content')
    @else
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                @if (Request()->route()->getPrefix() === '/petugas')
                    @include('layouts.partials.petugas.aside')
                @else
                    @include('layouts.partials.masyarakat.aside')
                @endif
                <div class="page-content-wrapper">
                    @if (Request()->route()->getPrefix() === '/petugas')
                        @include('layouts.partials.petugas.header')
                    @else
                        @include('layouts.partials.masyarakat.header')
                    @endif
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        @if (auth()->guard('petugas')->check())
                            @if (auth()->guard('petugas')->user()->verification === 'Y')
                                @yield('content')
                            @else
                                <div class="alert alert-danger">
                                    Akun anda belum di verifikasi
                                </div>
                            @endif
                        @else
                            @yield('content')
                        @endif
                    </main>
                    <!-- END Page Content -->
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                    @if (Request()->route()->getPrefix() === '/petugas')
                        @include('layouts.partials.petugas.footer')
                    @else
                        @include('layouts.partials.masyarakat.footer')
                    @endif <!-- BEGIN Shortcuts -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left"
                title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->
        <!-- BEGIN Page Settings -->
        <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-right modal-md">
                <div class="modal-content">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                        <h4 class="m-0 text-center color-white">
                            Pengaturan Layout
                            <small class="mb-0 opacity-80">Mengatur antarmuka halaman</small>
                        </h4>
                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="settings-panel">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h1 class="p-0">
                                        App Layout
                                    </h1>
                                </div>
                            </div>
                            <br>
                            <div class="list" id="fh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                    data-class="header-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Header</span>
                                <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                    data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Top Navigation</span>
                                <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                            </div>
                            <hr class="mb-0 mt-4">

                        </div>
                        <span id="saving"></span>
                    </div>
                </div>
            </div>
        </div> <!-- END Page Settings -->
        @endif

        <script src="{{ asset('assets') }}/js/vendors.bundle.js"></script>
        <script src="{{ asset('assets') }}/js/app.bundle.js"></script>
        <script src="{{ asset('assets') }}/js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="{{ asset('assets') }}/js/scripts.js"></script>
        <script src="{{ asset('assets') }}/js/chart.min.js"></script>
        @stack('javascript')
        @livewireScripts
    </body>

    <!-- Mirrored from sim.rembangkab.go.id/portal/home/web by HTTrack Website Copier/3.x [XR&CO'2017], Wed, 14 Dec 2022 19:06:48 GMT -->

    </html>
