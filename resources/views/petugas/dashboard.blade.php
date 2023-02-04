@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-xl-12">
		<!--Basic alerts-->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12 pt-2">
				<div class="card mb-2 bg-warning-800">
					<div class="card-body">
						<a href="{{ route('petugas.pengaduan.index') }}"
						class="d-flex flex-row align-items-center" target="_blank"
						style="text-decoration: none !important;">
						<div class="icon-stack display-3 flex-shrink-0">
							<i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
							<i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
						</div>
						<div class="ml-3 color-white">
							<strong>
								Pengaduan Masuk
							</strong>
							<br>
							{{ $count['pengaduan'] ?? 0 }}
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12 pt-2">
			<div class="card mb-2 bg-primary-800">
				<div class="card-body">
					<a href="#"
					class="d-flex flex-row align-items-center" target="_blank"
					style="text-decoration: none !important;">
					<div class="icon-stack display-3 flex-shrink-0">
						<i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
						<i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
					</div>
					<div class="ml-3 color-white">
						<strong>
							Masyarakat Terdaftar
						</strong>
						<br>
						{{ $count['masyarakat'] ?? 0 }}
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12 pt-2">
		<div class="card mb-2 bg-success-800">
			<div class="card-body">
				<a href="#"
				class="d-flex flex-row align-items-center" target="_blank"
				style="text-decoration: none !important;">
				<div class="icon-stack display-3 flex-shrink-0">
					<i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
					<i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
				</div>
				<div class="ml-3 color-white">
					<strong>
						Pengaduan 7 Menit Yang lalu
					</strong>
					<br>
					{{ $count['selesai'] ?? 0 }}

				</div>
			</a>
		</div>
	</div>
</div>
</div>
<hr>

<div class="bg-white col-md-7 rounded border p-3">
	<canvas id="statistik_pengaduan"></canvas>
</div>

</div>
</div>
@endsection

@push('javascript')
<script>
	//definisikan chartData
	var chartData = {};
	//data pengaduan
	chartData.data_pengaduan = {
		months: [<?= $charts['bulan'] ?>],
		semua_pengaduan: [{{ $charts['perbulan'] }}],
	};
	//priode statistik
	chartData.priode = "2023";

	const app = {
		canvasContext: document.getElementById('statistik_pengaduan').getContext('2d')
	};

	$(document).ready(()=>{
		line(chartData,app);
	})
</script>
@endpush