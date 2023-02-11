@extends('layouts.app')
@section('content')
<div class="mt-2 mb-4">
	<a href="{{ route('petugas.manage-petugas.add') }}" class="btn btn-success" id="tambah_pengaduan">Tambah Petugas</a>
</div>
<div id="panel-1" class="panel">
	<div class="panel-hdr">
		<h2>
			Semua Petugas {{ count($petugas)-1 }} + Kamu
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
			<table id="tabel_petugas" class="table table-sm table-bordered table-hover table-striped m-0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>No HP</th>
						<th>Username</th>
						<th>Level</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					@if (!empty($petugas))
					@php
					$i = 0;
					@endphp
					@foreach ($petugas as $row)
					@php
					$i++;
					@endphp
					<tr>
						<td>{{ $i; }}</td>
						<td>{{ ucwords($row->nama_petugas); }}</td>
						<td>{{ $row->no_telp }}</td>
						<td>
							{{ $row->username }}
							@if ($row->id === auth()->guard('petugas')->user()->id)
                               ( KAMU )
							@endif
						</td>
						
						<td>
							<div class="badge badge-success">{{ $row->level }}</div>
						</td>
						<td class="text-center">
							{{-- <a href="{{route('petugas.manage-petugas.detail',$row->id)}}" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-eye"></i>
							</a> --}}
							<a href="{{route('petugas.manage-petugas.edit',$row->id)}}" class="btn btn-success btn-sm btn-icon" title="Detail">
								<i class="fal fa-edit"></i>
							</a>
							<a onclick="return confirm('Apakah anda yakin?')" href="{{ route('petugas.manage-petugas.delete',$row->id) }}" class="btn btn-danger btn-sm btn-icon" title="delete">
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
	$('#tabel_petugas').dataTable({
		responsive: true,
		pageLength: 10,
		order: [
			[0, 'asc']
			]
	});
</script>
@endpush