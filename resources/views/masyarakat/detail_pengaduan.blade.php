@extends('layouts.app')
@section('content')
<div class="bg-white border p-4 rounded">
	<h4>Detail Pengaduan</h4>
	<hr>
	<dt>
		<dd><b>Judul Pengaduan</b>: {{ $data->judul_pengaduan }}</dd>
		<hr>
		<dd><b>Tanggal</b>: {{ (new \Carbon\Carbon($data->tgl_pengaduan))->isoFormat('dddd, D MMMM Y') }}</dd>
		<hr>
		<dd>
			<b>Attachment:</b>
			<br>
			<img class="rounded border" width="200px" src="{{ asset('storage/'.$data->foto) }}" alt="">
		</dd>
		<hr>
		<dd><b>ISI PENGADUAN</b>:
			<br>
			<div class="p-3 bg-white border rounded">
				{{ $data->isi_laporan }}
			</div>
		</dd>
		<dd>
			<b>TANGGAPAN: </b>
			@if ($data->tanggapan()->count() > 0)
			@foreach ($data->tanggapan as $element)
			<div class="border bg-info mb-3 rounded">
				<div style="font-size: 12px;" class="bg-info rounded shadow col-md-4 text-white p-2">
					<i class="fal fa-user"></i> : Dedy - <i class="fal fa-calendar"></i>&nbsp;{{ (new \Carbon\Carbon($data->tanggal_tanggapan))->isoFormat('dddd, D MMMM Y') }}
				</div>
				<p class="p-3 text-white">
					{{ $element->tanggapan }}
				</p>
			</div>
			@endforeach
			@else
			<span class="badge badge-info">Belum Ada tanggapan</span>
			@endif
		</dd>
	</dt>
</div>
@endsection