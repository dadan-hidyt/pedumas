<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report PDF Tanggal {{ request()->start_date }} - {{ request()->end_date }}</title>
    <style>
        table td{
            font-size:small;
        }
        table{
            width:100%;
            padding:2px;
            border-collapse:collapse;
            border:1px solid #dedede;
        }
        thead{
            background:green;
            color:white;
            height:40px;
            box-sizing:border-box;
        }
        
        th,td{
            border:1px solid #dedede;
        }
        h3{
            background:yellow;
            padding:10px;
            text-align:center;
            color:black;
        }
    </style>
</head>
<body>
    <h3>Laporan Pengaduan {{ request()->start_date }} - {{ request()->end_date }}</h3>
    <p>
        Total: {{ count($data) }}
    </p>
    <table>
        <thead>
          <tr>
          <th>Pengadu</th>
            <th>Judul</th>
            <th>Isi Aduan</th>
            <th>Tanggal</th>
            <th>File Pendukung</th>
            <th>Di tanggapi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                <td>{{ $row->masyarakat->nama }} {{ $row->masyarakat->nik}}</td>
                <td>{{ $row->judul_pengaduan }}</td>
                <td>{{ $row->isi_laporan }}</td>
                <td>{{ $row->tgl_pengaduan }}</td>
                <td>
                    @if($row->foto)
                        <img width='30px' height='40px' src="{{ storage_path('app/public/'.$row->foto) }}" alt="">
                    @else
                    tidak ada
                    @endif
                </td>
                <td>
                    @if($row->tanggapan_count > 0)
                        Ya
                    @else
                        Belum
                    @endif
                </td>
                <td>{{ $row->status == 0 ? 'pending' : $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>