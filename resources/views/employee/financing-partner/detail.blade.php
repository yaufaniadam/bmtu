<x-layout>
    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-user"></i>
            </h1>
            <h1 class="h3 text-gray-800">Detail Mitra</h1>
        </div>
    </x-slot:title>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-5">
        <div class="col-6 mx-auto">
            <div class="d-flex flex-row mb-3">
                <div class="mr-3">
                    <div class="" style="max-width: 80px; max-height: 80px;min-width: 80px; min-height: 80px">
                        <div class="img-thumbnail rounded-circle" style="background-image: url( {{ asset($partner->foto) }});
                        background-size:cover;background-position: center;height: 80px;">
                        </div>
                    </div>
                </div>
                <div class="">
                    <h6 class="mb-0"><b>{{ $partner->nama_lengkap }}</b></h6>
                    <span>ID Mitra : {{ $partner->id }}</span><br>
                    <span>{{ $partner->alamat }}</span>
                    <p>{{ $partner->telepon }}</p>
                </div>
            </div>
            <a href="{{ route('financing.create',$partner->id) }}"
                class="btn btn-block btn-sm btn-warning mb-3">
                <i class="fas fa-fw fa-plus-circle"></i>
                Pembiayaan Baru
            </a>
            <x-employee.partner-financing :partner-id="$partner->id" />

        </div>
    </div>


</x-layout>
