<div class="bg-white border p-4 rounded">
    <h4>Detail Pengaduan</h4>
    <hr>
    <dt>
    <dd><b>Pengadu</b>: {{ $data->masyarakat->nama }} | {{ $data->masyarakat->nik }}</dd>
    <hr>
    <dd><b>Judul Pengaduan</b>: {{ $data->judul_pengaduan }}</dd>
    <hr>
    <dd><b>Tanggal</b>: {{ (new \Carbon\Carbon($data->tgl_pengaduan))->isoFormat('dddd, D MMMM Y') }}</dd>
    <hr>
    <dd>
        <b>Attachment:</b>
        <br>
        <img class="rounded border" width="200px" src="{{ asset('storage/' . $data->foto) }}" alt="">
    </dd>
    <hr>
    <dd><b>ISI PENGADUAN</b>:
        <br>
        <div class="p-3 bg-success border rounded">
            {{ $data->isi_laporan }}
        </div>
    </dd>
    <dd>
        <b>TANGGAPAN: </b>
        @if ($data->tanggapan_count > 0)
            @foreach ($data->tanggapan as $element)
                <div class="border bg-info mb-3 rounded">
                    <div style="font-size: 12px;" class="bg-info rounded shadow col-md-5 text-white p-2">
                        <i class="fal fa-user"></i> : {{ $element->petugas->nama_petugas ?? 'admin' }}
                        ({{ $element->petugas->level ?? 'administrator' }}) - <i
                            class="fal fa-calendar"></i>&nbsp;{{ (new \Carbon\Carbon($element->tanggal_tanggapan))->isoFormat('dddd, D MMMM Y') }}
                        @if (auth()->guard('petugas')->user()->id == $element->id_petugas)
                            :: <a onclick="return confirm('Apakah anda yakin?')" class="bg-danger p-1 rounded-circle"
                                href="{{ route('petugas.pengaduan.tanggapan.delete', [$data->id, $element->id]) }}"><i
                                    class="fal text-white fa-trash"></i></a>
                        @endif
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
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tanggapi
    </button>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="modal_tanggapan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_tanggapan">Tanggapi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if (session()->has('gagal'))
                        <p class="alert alert-danger">{{ session('gagal') }}</p>
                    @endif
                    <form action="" wire:submit.prevent="simpan_tanggapan">
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea wire:model.defer="isi_tanggapan" id="" cols="30" rows="10" class="form-control"></textarea>
                            @error('isi_tanggapan')
                                {{ $message }}
                            @enderror
                        </div>
                        <button class="btn btn-success">Simpan </button>
                        <span wire:loading wire:target="simpan_tanggapan">Loading...</span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        window.addEventListener('successfuly', function() {
            $('#exampleModal').modal('hide');
            window.location.reload();
        })
    }
</script>
