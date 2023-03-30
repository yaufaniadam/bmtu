<x-layout>
    <x-slot:title>
        Data Penempatan Pegawai
    </x-slot:title>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-6 mx-auto">
            <div class="d-flex flex-row align-items-center mb-3">
                <div class="col-3">
                    <div class="" style="max-width: 100px; max-height: 100px;min-width: 100px; min-height: 100px">
                        <div class="img-thumbnail rounded-circle" style="background-image: url( {{ url('image?file='.$employee->foto) }});
                        background-size:cover;background-position: center;height: 100px;">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <h6 class="mb-0"><b>{{ $employee->nama_lengkap }}</b></h6>
                    <span>{{ $employee->nip }}</span>
                </div>
            </div>
            <x-employee.placement-history :employee-id="$employee->id" />
        </div>
    </div>


</x-layout>
