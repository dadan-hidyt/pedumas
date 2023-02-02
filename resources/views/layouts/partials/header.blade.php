  <!-- BEGIN Page Header -->
  <header class="page-header" role="banner">
    <!-- we need this logo when user switches to nav-function-top -->
    <div class="page-logo">
      <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
        <img style="width:40px;" src="{{ asset('assets/newlogo.png') }}" alt="logo" aria-roledescription="logo">
        <span class="page-logo-text mr-1">{{ config('app.name') }}</span>
        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
      </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
      <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
        <i class="ni ni-menu"></i>
      </a>
      <ul>
        <li>
          <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
            <i class="ni ni-minify-nav"></i>
          </a>
        </li>
        <li>
          <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
            <i class="ni ni-lock-nav"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
      <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
        <i class="ni ni-menu"></i>
      </a>
    </div>

    <div class="ml-auto d-flex">
      <!-- activate app search icon (mobile) -->
      <div class="hidden-sm-up">
        <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
          <i class="fal fa-search"></i>
        </a>
      </div>
      <!-- app settings -->
      <div class="hidden-md-down">
        <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
          <i class="fal fa-cog"></i>
        </a>
      </div>
      <!-- app shortcuts -->
      <div>
        <a href="#" class="header-icon">
          <i class="fal fa-globe"></i>
        </a>
      </div>
      <div>
        <a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
          <i class="fal fa-cube"></i>
        </a>
        
        <div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
          <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
            <h4 class="m-0 text-center color-white">
              Quick Shortcut web <small class="mb-0 opacity-80">User Applications & Addons</small>
            </h4>
          </div>
          <div class="custom-scroll h-100">
            <div class="app-list">
              <li>
                <a href="external.html?link=http://data.rembangkab.go.id/" class="app-list-item hover-white">
                  <span class="icon-stack">
                    <i class="base-5 icon-stack-3x color-primary-600"></i>
                    <i class="base-7 icon-stack-2x color-primary-700"></i>
                    <i class="fal fal fa-database icon-stack-1x text-white fs-lg"></i>
                  </span>
                  <span class="app-list-name">
                  Open Data </span>
                </a>
              </li>
            </div>
          </div>
        </div>
      </div>
      <!-- app message -->

      <!-- app user menu -->
      <div>
        <a href="#" data-toggle="dropdown" title="{{ config('app.name') }}" class="header-icon d-flex align-items-center justify-content-center ml-2">
          <img src="{{ asset('assets/newlogo.png') }}" class="profile-image rounded-circle" alt="{{ config('app.name') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
          <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
              <span class="mr-2">
                <img src="{{ asset('assets/newlogo.png') }}" class="rounded-circle profile-image" alt="{{ config('app.name') }}">
              </span>
              <div class="info-card-text">
                <div class="fs-lg text-truncate text-truncate-lg"><?= Auth::guard('masyarakat')->user()->nama ?></div>
                <span>Masyarakat</span>
              </div>
            </div>
          </div>
          <div class="dropdown-divider m-0"></div>
          <a href="#" class="dropdown-item" data-action="app-fullscreen">
            <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
            <i class="float-right text-muted fw-n">F11</i>
          </a>
        </div>
      </div>
    </div>
  </header>
        <!-- END Page Header -->