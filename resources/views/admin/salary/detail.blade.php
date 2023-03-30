<x-layout>
    <x-slot:title>
        Detail Gaji Pegawai
    </x-slot:title>

    <div class="col-6 mx-auto">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="col-3">
                <div class="" style="max-width: 100px; max-height: 100px;min-width: 100px; min-height: 100px">
                    <div class="img-thumbnail rounded-circle" style="background-image: url( {{ url('image?file='.$employee->foto) }});
                        background-size:cover;background-position: center;height: 100px;">
                    </div>
                </div>
            </div>
            <div class="col-5 text-dark">
                <h6 class="mb-0"><b>{{ $employee->nama_lengkap }}</b></h6>
                <small>{{ $position }}</small><br>
            </div>
        </div>
    </div>
    <div class="col-6 mx-auto mb-5">
        <div class="card">
            <div class="card-body">
                @foreach($salary_detail as $item)
                    <div class="col-12 d-flex border-bottom my-3 justify-content-between">
                        <span class="font-weight-{{ $item->style }}">{{ $item->judul }}</span>
                        @php
                            $new_value = $item->value;
                            if ( is_numeric($item->value)) {
                            $new_value = number_format($item->value, 0, ",", ".");
                            }
                            // is_string($item->value) != null ? $item->value : number_format($item->value, 0, ",", ".")
                        @endphp
                        <span>{{ $new_value }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
