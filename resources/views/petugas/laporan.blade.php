@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<h2>Generate Laporan</h2>
	<hr>
	<div class="col-md-5 bg-white rounded border p-5">
		<form action="{{ route('petugas.laporan.generate') }}" method="GET">
			@csrf
			<div class="form-grup">
				<div class="row">
					<div class="col-6">
						<label for="start">Start Date</label>
						<input type="date" name="start_date" class="form-control">
					</div>
					<div class="col-6">
						<label for="End">End Date</label>
						<input type="date" name="end_date" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group mt-4 custom-control custom-checkbox">
				<input type="checkbox" name="with_tanggapan" class="custom-control-input" id="defaultUnchecked">
				<label class="custom-control-label" for="defaultUnchecked">Dengan Tanggapan</label>
			</div>
			<div class="form-group">
				<label for="masyarakat">Masyarakat</label>
				<select name="masyarakat" class="form-control" id="">
					<option value="">All</option>
					@foreach ($masyarakat as $element)
					<option value="{{$value->nik}}">All</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="type_output">Tipe Laporan</label>
				<select name="type_output" class="form-control" id="">
					<option value="">Tabel</option>
					<option value="">Singgel</option>
				</select>
			</div>
			<button class="btn btn-success"><i class="fal fa-print"></i></button>
		</form>
	</div>
</div>
@endsection