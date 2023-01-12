<x-layout>
    <x-slot:title>
        Marketing Report
    </x-slot:title>

    <div class="col-6 mx-auto mb-5">
        <div class="d-flex flex-row align-items-center mb-3">
            <div class="col-3">
                <div class="" style="max-width: 100px; max-height: 100px;min-width: 100px; min-height: 100px">
                    <div class="img-thumbnail rounded-circle" style="background-image: url( {{ asset($partner->foto) }});
                        background-size:cover;background-position: center;height: 100px;">
                    </div>
                </div>
            </div>
            <div class="col-9 text-dark">
                <h6 class="mb-0"><b>{{ $partner->nama_lengkap }}</b></h6>
                <small>ID Mitra : {{ $partner->id }}</small><br>
                <small>{{ $partner->alamat }}</small><br>
                <small>{{ $partner->telepon }}</small><br>
            </div>
        </div>
    </div>

    <div class="col-8 mx-auto mb-4">
        <div class="card">
            <div class="card-header">
                Keterangan Pembiayaan
            </div>
            <div class="card-body">
                <div class="row mx-2">
                    <div class="col-5">
                        Jenis Pembiayaan
                    </div>
                    <div class="col-7">
                        {{ $marketing_report->jenis_pembiayaan }}
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row mx-2">
                    <div class="col-5">
                        Nama Marketing
                    </div>
                    <div class="col-7">
                        {{ $marketing_report->employee->nama_lengkap }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mx-2">
                    <div class="col-5">
                        Tanggal
                    </div>
                    <div class="col-7">
                        {{ $marketing_report->tanggal->isoFormat('D MMMM Y') }}
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row mx-2">
                    <div class="col-5">
                        Plafon Pembiayaan
                    </div>
                    <div class="col-7">
                        Rp.{{ $marketing_report->nominal }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mx-2">
                    <div class="col-5">
                        Spesifikasi
                    </div>
                    <div class="col-7">
                        {{ $marketing_report->keterangan }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8 mx-auto mb-5">
        <div class="card">
            <div class="card-header">
                Marketing Cycle
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($financing_cycles as $cycle)
                        <li class="nav-item">
                            <a class="nav-link {{ $cycle->cycle->id == 1 ? 'active' : '' }}"
                                id="{{ $cycle->cycle->cycle }}-tab" data-toggle="tab"
                                href="#{{ $cycle->cycle->cycle }}" role="tab"
                                aria-controls="{{ $cycle->cycle->cycle }}"
                                aria-selected="true">{{ $cycle->cycle->cycle }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($financing_cycles as $cycle)
                        <div class="tab-pane fade {{ $cycle->cycle->id == 1 ? 'show active' : '' }} border-right border-left border-bottom"
                            id="{{ $cycle->cycle->cycle }}" role="tabpanel" aria-labelledby="home-tab">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex flex-row align-items-center mb-3 text-dark">
                                            <small class="mr-1"><i class="fas fa-fw fa-calendar"></i></small>
                                            {{ $cycle->tanggal != null ? $cycle->tanggal->isoFormat('D MMMM Y') : '' }}
                                        </div>
                                        <div class="d-flex flex-row align-items-center text-dark">
                                            <small class="mr-1"><i class="fas fa-fw fa-edit"></i></small>
                                            <b>Catatan</b>
                                        </div>
                                        <p>{{ $cycle->keterangan }}</p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div
                                            style="max-width: 250px; max-height: 150px;min-width: 250px; min-height: 150px">
                                            <div class="img-thumbnail"
                                                style="background-image: url( {{ asset($cycle->foto) }}); background-size:cover;background-position: center;height: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
