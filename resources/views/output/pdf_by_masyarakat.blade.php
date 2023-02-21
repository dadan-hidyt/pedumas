@if(request()->start_date && request()->end_date)
<h1>
    Laporan pengaduan dari {{request()->start_date}} - {{ request()->end_date }}
</h1>
@else
<h1>Lapporan pengaduan</h1>
@endif
<table border="1" width="100%">
<thead>
<tr>
    <th>Judul</th>
    <th>Isi Pengaduan</th>
    <td>Status</td>
    <th>Tanggal</th>
    <th>Gambar Pendukung</th>
    <th>Di tanggapi</th>
</tr>
</thead>
<tbody>
    @foreach($data as $row)
    <tr>
    <td>{{$row->judul_pengaduan}}</td>
    <td>{{ $row->isi_laporan }}</td>
    <td>

    @if($row->status == 0)

    <span>Pending</span>
    @else
    <span>{{$row->status}}</span>

    @endif
    </td>
    <td>{{ $row->tgl_pengaduan }}</td>
    <td>
        <img width="20%" height='20%' src="{{ asset('storage/'.$row->foto) }}" alt="">
    </td>
    <td>
        @if($row->tanggapan_count > 0)
            <span style='color:green'>YA</span>
        @else
        <span style='color:red'>TIDAK</span>
        @endif
    </td>
</tr>
    @endforeach
</tbody>
</table>