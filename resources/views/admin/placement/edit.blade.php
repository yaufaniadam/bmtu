<x-layout>
    @push('css')
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <x-slot:title>
        Edit Data Penempatan Pegawai
    </x-slot:title>

    <div class="card col-8 mx-auto">
        <div class="card-body">
            <form action="{{ route('placement.update',$placement->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_pegawai" value="{{ $placement->id_pegawai }}">

                <div class="form-group row">
                    <label for="nama_pegawai" class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="nama_pegawai" disabled
                            value="{{ $placement->employee['nama_lengkap'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="branch" class="col-sm-4 col-form-label">Cabang</label>
                    <div class="col-sm-8">
                        <select
                            class="js-example-basic-single form-control
                                {{ $errors->has('id_cabang') ? 'is-invalid' : '' }}"
                            name="id_cabang" id="id_cabang">
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('id_cabang') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="position" class="col-sm-4 col-form-label">Jabatan</label>
                    <div class="col-sm-8">
                        <select
                            class="form-control {{ $errors->has('id_cabang') ? 'is-invalid' : '' }}"
                            id="id_posisi" name="id_posisi">
                            <option>Pilih jabatan</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ $position->id == $placement->position['id'] ? 'selected' : '' }}>
                                    {{ $position->posisi }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('id_posisi') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_mulai"
                            class="form-control {{ $errors->has('tanggal_mulai') ? 'is-invalid' : '' }}"
                            id="tanggal_mulai" value="{{ $placement->tanggal_mulai }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal_mulai') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_selesai"
                            class="form-control {{ $errors->has('tanggal_selesai') ? 'is-invalid' : '' }}"
                            id="tanggal_selesai" value="{{ $placement->tanggal_selesai }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal_selesai') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="file_sk" class="col-sm-4 col-form-label">File SK</label>
                    <div class="col-sm-6">
                        <input type="file" name="file_sk"
                            class="form-control {{ $errors->has('file_sk') ? 'is-invalid' : '' }}"
                            id="file_sk" value="{{ old('file_sk') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('file_sk') }}
                        </div>
                    </div>
                    <div class="col-sm-2 px-1">
                        <a href="{{ asset($placement->file_sk) }}" class="btn btn-success">
                            {{-- <i class="fas fa-fw fa-download"></i> --}}
                            download
                        </a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-warning btn-block">
                            <i class="fas fa-fw fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#id_cabang').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Cari berdasarkan nama cabang',
                    ajax: {
                        url: "{{ route('placement.create') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term,
                                type: 'branch',
                            };

                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.cabang,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });

                $("#id_cabang").html('<option value="' + " {{ $placement->id_cabang }}" + '" selected>' +
                    "{{ $placement->branch['cabang'] }}" + '</option>');
            });

        </script>
    @endpush
</x-layout>
