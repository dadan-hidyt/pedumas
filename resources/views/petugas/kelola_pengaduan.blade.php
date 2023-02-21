@extends('layouts.app')
@section('content')
<div id="panel-1" class="panel">
	<div class="panel-hdr">
		<h2>
			Pengaduan Masuk
		</h2>
		<div class="panel-toolbar">
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
			<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen">
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
							<td>{{ $i; }}</td>
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
								@if ($element->tanggapan_count > 0)
									<span class="badge badge-primary">({{$element->tanggapan_count}}) Tanggapan</span>
									@else
									<span class="badge badge-danger">Belum Di tanggapi</span>
								@endif
							</td>
							<td>
								<a href="{{route('petugas.pengaduan.detail',$element->id)}}" class="btn btn-success btn-sm btn-icon" title="Detail">
									<i class="fal fa-eye"></i>
								</a>
								<a href="{{route('petugas.pengaduan.proses',$element->id)}}" class="btn btn-success btn-sm btn-icon" title="proses">
									<i class="fal fa-times"></i>
								</a>
								<a onclick="return confirm('Apakah anda yakin?')" href="{{ route('petugas.pengaduan.selesai',$element->id) }}" class="btn btn-danger btn-sm btn-icon" title="selesai">
									<i class="fal fa-check"></i>
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