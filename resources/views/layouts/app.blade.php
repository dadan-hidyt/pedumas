<!DOCTYPE html>
<html lang="en" class="root-text-sm">

<!-- Mirrored from sim.rembangkab.go.id/portal/home/web by HTTrack Website Copier/3.x [XR&CO'2017], Wed, 14 Dec 2022 19:06:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>
    @if(isset($title))
      {{ $title }} - {{ config('app.name') }}
    @else 
      {{ config('app.name') }}
    @endif
    </title>
    <meta name="description" content="SIM Rembang">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/app.bundle.css">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/datagrid/datatables/datatables.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/img/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/img/logo.png">
    <link rel="mask-icon" href="{{ asset('assets') }}/img/logo.png" color="#5bbad5">
    <meta name="hostname" content="index.html">
    <meta name="app-url" content="index.html">
    <meta name="assets-url" content="{{ asset('assets') }}/index.html">
    <meta name="environment" content="">
    <meta name="author" content="Andry Hidayat">
    <!-- Optional: page related CSS -->
    <!-- PHP docs -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets') }}/css/markdown.css">
    <!--  -->
    @livewireStyles
</head>

<body class="mod-bg-3">
    <!-- DOC: script to save and load page settings -->
    <script>
        /**
         *	This script should be placed right after the body tag for fast execution
         *	Note: the script is written in pure javascript and does not depend on thirdparty library
         **/
        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /**
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /**
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme')) {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);
        }
        /**
         * Save to localstorage
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item) {
                return /^(nav|header|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme')) {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
        }
        /**
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        }
    </script>
    <!-- BEGIN Page Wrapper -->
    @guest
        @yield('content')
    @else
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                @include('layouts.partials.aside')
                <div class="page-content-wrapper">
                    @include('layouts.partials.header')
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                       @yield('content')
                    </main>
                    <!-- END Page Content -->
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                    @include('layouts.partials.footer')
                    <!-- BEGIN Shortcuts -->
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
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip"
                data-placement="left" title="Full Screen">
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
        <script>
            $(document).ready(function() {
                var searchRequest = null;

                $(function() {
                    var minlength = 3;

                    $("#search_apps").keyup(function() {
                        var that = this,
                            value = $(this).val();
                        console.log('key : ' + value);
                        var valCategory = "Web";
                        $.ajax({
                            url: 'https://sim.rembangkab.go.id/portal/home/search',
                            type: 'POST', // Tentukan type nya POST atau GET
                            data: {
                                category: valCategory,
                                keyword: value
                            }, // Set data yang akan dikirim
                            dataType: "json",
                            beforeSend: function(e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                            success: function(response) {
                                $("#view").html(response.hasil);
                            },
                            error: function(xhr, ajaxOptions,
                            thrownError) { // Ketika terjadi error
                                alert(xhr.responseText); // munculkan alert
                            }
                        });
                    });
                });

                $('#table-sm-1').dataTable({
                    responsive: true,
                    pageLength: 100,
                    order: [
                        [0, 'asc']
                    ]
                });

                $('#table-covid').dataTable({
                    responsive: true,
                    pageLength: 100,
                    order: [
                        [0, 'asc']
                    ],
                    searching: false,
                    bLengthChange: false
                });
            });
        </script>
        @livewireScripts
    </body>

    <!-- Mirrored from sim.rembangkab.go.id/portal/home/web by HTTrack Website Copier/3.x [XR&CO'2017], Wed, 14 Dec 2022 19:06:48 GMT -->

    </html>
