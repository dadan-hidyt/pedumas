@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-xl-12">
		<!--Basic alerts-->
		<div class="row">
			@livewire('petugas.dashboard-count-statistik', ['count'=>$count])
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