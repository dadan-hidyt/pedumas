@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="col-md-6">
		<div class="bg-white p-3 border rounded">
			<h1>Info Akun & Update</h1>
			@error('success')
			<div class="alert alert-success">{{$message}}</div>
			@enderror
			<form action="" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" name="nama" class="form-control" value="{{ auth()->guard('masyarakat')->user()->nama }}">
					@error('nama')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="username">username</label>
					<input type="text" name="username" class="form-control" value="{{ auth()->guard('masyarakat')->user()->username }}">
					@error('username')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Update</button>
				</div>
			</form>	
		</div>
	</div>
</div>
@endsection