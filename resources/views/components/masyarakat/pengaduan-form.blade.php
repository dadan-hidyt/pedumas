<div class="container-fluid">
   <div class="col-md-12">
     <div class="mb-4">
        <a href="" class="btn btn-primary">Kembali</a>
    </div>
    <!-- panel start -->
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
          <h2>BUAT PENGADUAN BARU</h2>
          <div class="panel-toolbar">
            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
        </div>
    </div>
    <div class="panel-container show">
      <div class="panel-content">
        <div id="view">
            @if (session()->has('success'))
            <p class="alert alert-success">{{ session('success'); }}</p>
            @elseif (session()->has('gagal'))
            <p class="alert alert-danger">{{ session('gagal'); }}</p>
            @endif
            <form wire:submit.prevent="simpan">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input wire:model="pengaduan.tgl_pengaduan" type="date" class="form-control">
                    @error('pengaduan.tgl_pengaduan')
                    <i class="text-danger"> {{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_pengaduan">judul pengaduan</label>
                    <input wire:model="pengaduan.judul_pengaduan" type="text" class="form-control">
                    @error('pengaduan.judul_pengaduan')
                    <i class="text-danger"> {{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi Laporan</label>
                    <textarea  wire:model="pengaduan.isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control"></textarea>
                    @error('pengaduan.isi_laporan')
                    <i class="text-danger"> {{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" wire:model="pengaduan_poto" class="form-control" name="foto" id="">
                    <div wire:loading wire:target="pengaduan_poto">Mengupload...</div>
                    @error('pengaduan_poto')
                    <i class="text-danger"> {{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    @if ($type == 'edit')
                    <button class="btn btn-success">Update</button>
                    @else
                    <button class="btn btn-primary">KIRIM</button>
                    @endif
                    <div wire:loading wire:target="simpan">Loading...</div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- e:panel -->
</div>
</div>