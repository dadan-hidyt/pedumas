@extends('layouts.app')
@section('content')
<div class="rounded">
	<a href="../../service-desk/index.html" target="_blank">
		<img  class="rounded" src="{{ asset('assets/img/iklan-kms-rembang.png') }}" width="100%" alt="">
	</a>
</div>


<div id="panel-1" class="panel">
	<div class="panel-hdr">
		<h2>
			Web Desa
		</h2>
		<div class="panel-toolbar">
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
		</div>
	</div>
	<div class="panel-container show">
		<div class="panel-content">
			<table id="table-sm-1" class="table table-sm table-bordered table-hover table-striped m-0">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Tanggapan</th>
						<th>Isi Laporan</th>
						<th>Foto</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					@if (!empty($pengaduan))
					@php
						$i = 0;
					@endphp
					@foreach ($pengaduan as $element)
					@php
						$i++;
					@endphp
					<tr>
						<td>{{ $i; }}</td>
						<td>{{ $element->judul_pengaduan; }}</td>
						<td>{{ $element->tgl_pengaduan; }}</td>
						<td>
							@if ($element->status == 0)
							<span class="badge badge-danger">Pending</span>
							@else
							@if ($element->status == 'proses')
							<span class="badge badge-info">{{ ucwords($element->status); }}</span>
							@elseif($element->status == 'selesai')
							<span class="badge badge-success">{{ ucwords($element->status); }}</span>
							@endif
							@endif
						</td>
						<td>
							@if ($element->tanggapan->count() >= 1)
							<a href="{{route('masyarakat.pengaduan.tanggapan',$element->id)}}" target="_blank" title="Detail">
								<i class="fal fa-eye"></i> Lihat Tanggapan
							</a>
							@else
							<span>Belum Di tanggapi</span>
							@endif
						</td>
						<td>{{ $element->isi_laporan; }}</td>
						<td>
							@if (!empty($element->foto))
							<img width="100px" src="{{ asset('storage/'.$element->foto); }}" alt="">
							@endif
						</td>

						<td>
							<a href="../../../external.html?link=http://ronggomulyo-rembang.desa.id/" target="_blank" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-eye"></i>
							</a>
							<a href="../../../external.html?link=http://ronggomulyo-rembang.desa.id/" target="_blank" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-eye"></i>
							</a>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection