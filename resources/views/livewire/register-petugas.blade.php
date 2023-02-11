<div class="col-md-4 mx-auto mt-5">
 <!-- panel start -->
 <div id="panel-1" class="panel auth">
   <div class="panel-hdr">
    <h2> DAFTAR PETUGAS - PEDUMAS KAB.IFSU </h2>
    <div class="panel-toolbar">
       <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
   </div>
</div>
<div class="panel-container show">
 <div class="panel-content">
   <div id="view">
    @if (session()->has('gagal'))
    <p class="alert alert-danger">{{ session('gagal') }}</p>
    @endif
    <form action="" wire:submit.prevent="daftar">
      <div class="form-group">
          <label for="nama_petugas">Nama Petugas</label>
          <input type="text" wire:model.defer="petugas.nama_petugas" class="form-control" id="nama_petugas" name="nama_petugas">
          @error('petugas.nama_petugas')
          <span class="form-title text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="form-group">
        <label for="no_telp">Nomor Telepon</label>
        <input type="text" class="form-control" wire:model.defer="petugas.no_telp" id="no_telp" name="no_telp">
        @error('petugas.no_telp')
        <span class="form-title text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" wire:model.defer="petugas.username" class="form-control" id="username" name="username">
        @error('petugas.username')
        <span class="form-title text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" wire:model.defer="petugas.password" class="form-control" id="password" name="password">
        @error('petugas.password')
        <span class="form-title text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3 mb-3">
        <button class="btn btn-block btn-primary">Daftar Akun
            <div wire:loading wire:target='daftar' class="spinner-grow" style="height: 15px; width: 15px" role="status">
            </div></button>
        </div>
        <div class="mt-3">
          <span>Sudah Ada akun?<a href="{{ route('login') }}">Login</a></span>
      </div>
  </form>
</div>
</div>
</div>
</div>
<!-- e:panel -->
</div>