@extends('layouts.app')
@section('content')
<div class="mt-3 mb-3">
	<a href="{{ route('petugas.manage-masyarakat.add') }}" class="btn btn-success">Tambah</a>
</div>
<div id="panel-1" class="panel">
	<div class="panel-hdr">
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
			<table id="tabel_masyarakat" class="table table-sm table-bordered table-hover table-striped m-0">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Total Pengaduan</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
                    @php
                        $i = 0;
                    @endphp
					@forelse ($masyarakat as $item)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i; }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->pengaduan_count }}</td>
                            <td class="text-center">
                                <a href="{{ route('petugas.manage-masyarakat.edit',$item->nik) }}" class="btn btn-success btn-sm btn-icon" title="edit">
                                    <i class="fal fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Apakah anda yakin?')" href="{{ route('petugas.manage-masyarakat.delete',$item->nik) }}" class="btn btn-danger btn-sm btn-icon" title="delete">
                                    <i class="fal fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <span>Not Data Found</span>
                    @endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@push('javascript')
<script>
	$('#tabel_masyarakat').dataTable({
		responsive: true,
		pageLength: 10,
		order: [
			[0, 'asc']
			]
	});
</script>
@endpush