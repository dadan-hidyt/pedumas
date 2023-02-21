@extends('layouts.app')
@section('content')
<div class="rounded">
	<a href="http://dadan.com">
		<img  class="rounded" src="{{ asset('assets/banner_pengaduan.png') }}" width="100%" alt="">
	</a>
</div>
<div id="panel-1" class="panel">
	<div class="panel-hdr">
		<h2>
			Lists Pengaduan
		</h2>
		<div class="panel-toolbar">
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
		</div>
	</div>
	<div class="panel-container show">
		<div class="panel-content">
			@error('success')
			<p class="alert alert-info">{{ $message }}</p>
			@enderror
			<table id="table_pengaduan" class="table table-sm table-bordered table-hover table-striped m-0">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Tanggapan</th>
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
						<td>{{ $i }}</td>
						<td>{{ $element->judul_pengaduan; }}</td>
						<td>{{ (new \Carbon\Carbon($element->tgl_pengaduan))->isoFormat('dddd, D MMMM Y') }}</td>
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
							@if ($element->tanggapan_count >= 1)
							<a href="{{route('masyarakat.pengaduan.detail',$element->id)}}" title="Detail">
								<i class="fal fa-eye"></i> Lihat Tanggapan
							</a>
							@else
							<span>Belum Di tanggapi</span>
							@endif
						</td>
						<td>
							<a href="{{route('masyarakat.pengaduan.detail',$element->id)}}" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-eye"></i>
							</a>
							<a href="{{route('masyarakat.pengaduan.edit',$element->id)}}" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-edit"></i>
							</a>
							<a onclick="return confirm('Apakah anda yakin?')" href="{{ route('masyarakat.pengaduan.delete',$element->id) }}" class="btn btn-danger btn-sm btn-icon" title="delete">
								<i class="fal fa-trash"></i>
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

@push('javascript')
<script>
	$('#table_pengaduan').dataTable({
		responsive: true,
		pageLength: 10,
		order: [
			[0, 'asc']
			]
	});
</script>
@endpush