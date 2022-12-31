<x-layout>
    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-plus-circle"></i>
            </h1>
            <h1 class="h3 text-gray-800">Data Pegawai</h1>
        </div>
    </x-slot:title>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-5">
        <div class="col-6 mx-auto">
            <div class="d-flex flex-row  mb-3">
                <div class="col-3">
                    <div class="" style="max-width: 100px; max-height: 100px;min-width: 100px; min-height: 100px">
                        <div class="img-thumbnail rounded-circle" style="background-image: url( {{ asset($partner->foto) }});
                        background-size:cover;background-position: center;height: 100px;">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <h6 class="mb-0"><b>{{ $partner->nama_lengkap }}</b></h6>
                    <span>ID Mitra : {{ $partner->id }}</span><br>
                    <span>{{ $partner->alamat }}</span>
                    <p>{{ $partner->telepon }}</p>
                </div>
            </div>
            <x-employee.partner-financing :partner-id="$partner->id" />

        </div>
    </div>


</x-layout>
