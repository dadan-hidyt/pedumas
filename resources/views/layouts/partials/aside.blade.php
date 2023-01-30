 <!-- BEGIN Left Aside -->
 <aside class="page-sidebar list-filter-active">
 	<div class="page-logo">
 		<a href="web.html" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
 			<img src="{{ asset('assets/logo.png') }}" style="width:40px!important;" alt="PEDUMAS-IFSU" aria-roledescription="logo">
 			<span class="page-logo-text mr-1">PEDUMAS <br> KABUPATEN IFSU</span>
 			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
 		</a>
 	</div>
 	<!-- BEGIN PRIMARY NAVIGATION -->
 	<nav id="js-primary-nav" class="primary-nav" role="navigation">
 		<div class="nav-filter">
 			<div class="position-relative">
 				<input type="text" id="nav_filter_input" placeholder="Cari Menu" class="form-control" tabindex="0">
 			</div>
 		</div>
 		<ul id="js-nav-menu" class="nav-menu">
 			<li>
 				<a href="{{ route('masyarakat.dashboard') }}" title="Dashboard" data-filter-tags="dashboard" class=" waves-effect waves-themed" aria-expanded="false">
 					<i class="fal fa-home"></i>
 					<span class="nav-link-text" data-i18n="nav.aplikasiweb">Dashboard</span>
 				</a>
 			</li>
 			<li>
 				<a href="{{ route('masyarakat.pengaduan.buat') }}" title="Buat Laporan" data-filter-tags="buatlaporan" class=" waves-effect waves-themed" aria-expanded="false">
 					<i class="fal fa-edit"></i>
 					<span class="nav-link-text">Buat Laporan</span>
 				</a>
 			</li>
 			<li>
 				<a href="{{ route('masyarakat.pengaduan.index') }}" title="Laporan Saya" data-filter-tags="laporansaya" class=" waves-effect waves-themed" aria-expanded="false">
 					<i class="fal fa-file"></i>
 					<span class="nav-link-text" data-i18n="nav.webinstansi">Pengaduan Saya</span>
 				</a>
 			</li>
			<li>
 				<a href="web-instansi.html" title="Logout" data-filter-tags="logout" class=" waves-effect waves-themed" aria-expanded="false">
 					<i class="fal fa-sign-out"></i>
 					<span class="nav-link-text" data-i18n="nav.webinstansi">Logout</span>
 				</a>
 			</li>
 		</ul>
 		<div class="filter-message js-filter-message bg-warning-600"></div>
 	</nav>
 	<!-- END PRIMARY NAVIGATION -->
 </aside>
      <!-- END Left Aside -->