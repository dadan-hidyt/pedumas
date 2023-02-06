<div wire:init='loadCount' class="col-lg-3 col-md-6 col-sm-12 pt-2">
    <div class="card mb-2 bg-warning-800">
        <div class="card-body">
            <a href="{{ route('petugas.pengaduan.index') }}"
            class="d-flex flex-row align-items-center" target="_blank"
            style="text-decoration: none !important;">
            <div class="icon-stack display-3 flex-shrink-0">
                <i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
                <i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
            </div>
            <div class="ml-3 color-white">
                <strong>
                    Pengaduan Masuk
                </strong>
                <br>
                {{ $dataAcounting['pengaduan'] ?? 0 }}
            </div>
        </a>
    </div>
</div>
</div>

<div wire:init='loadCount' class="col-lg-3 col-md-6 col-sm-12 pt-2">
    <div class="card mb-2 bg-primary-800">
        <div class="card-body">
            <a href="#"
            class="d-flex flex-row align-items-center" target="_blank"
            style="text-decoration: none !important;">
            <div class="icon-stack display-3 flex-shrink-0">
                <i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
                <i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
            </div>
            <div class="ml-3 color-white">
                <strong>
                    Masyarakat Terdaftar
                </strong>
                <br>
                {{ $dataAcounting['masyarakat'] ?? 0 }}
            </div>
        </a>
    </div>
</div>
</div>

<div wire:init='loadCount' class="col-lg-3 col-md-6 col-sm-12 pt-2">
    <div class="card mb-2 bg-success-800">
        <div class="card-body">
            <a href="#"
            class="d-flex flex-row align-items-center" target="_blank"
            style="text-decoration: none !important;">
            <div class="icon-stack display-3 flex-shrink-0">
                <i class="fal fa-circle icon-stack-3x opacity-100 color-white"></i>
                <i class="fal fal fa-clipboard-list icon-stack-1x opacity-100 color-white"></i>
            </div>
            <div class="ml-3 color-white">
                <strong>
                    Pengaduan 7 Menit Yang lalu
                </strong>
                <br>
                {{ $dataAcounting['selesai'] ?? 0 }}

            </div>
        </a>
    </div>
</div>
</div>