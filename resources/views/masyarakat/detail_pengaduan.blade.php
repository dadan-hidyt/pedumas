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
		<dd><b>Isi Pengaduan</b>:
			<br>
			<div class="alert alert-info">
				{{ $data->isi_laporan }}
			</div>
		</dd>
		<dd>
			Tanggapan: 
			@if ($data->tanggapan)
				@foreach ($data->tanggapan as $element)
					<div class="bg-success text-white rounded border p-3">
						Petugas : Dedy - {{ (new \Carbon\Carbon($data->tanggal_tanggapan))->isoFormat('dddd, D MMMM Y') }}
						<hr>
						<p>
							{{ $element->tanggapan }}
						</p>
					</div>
				@endforeach
			@endif
		</dd>
	</dt>
</div>
@endsection