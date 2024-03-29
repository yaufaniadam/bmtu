<x-layout>
    @push('css')
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <x-slot:title>
        Tambah Penempatan Pegawai
    </x-slot:title>

    <div class="col-lg-7 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header">
                Data Pegawai
            </div>
            <div class="card-body">
                <form action="{{ url('placement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="id_pegawai" class="col-sm-4 col-form-label">Pegawai</label>
                        <div class="col-sm-8">
                            <select
                                class="js-example-basic-single form-control
                                {{ $errors->has('id_pegawai') ? 'is-invalid' : '' }}"
                                name="id_pegawai" id="id_pegawai">
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('id_pegawai') }}
                            </div>
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
                                class="form-control {{ $errors->has('id_posisi') ? 'is-invalid' : '' }}"
                                id="id_posisi" name="id_posisi">
                                <option>Pilih jabatan</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}"
                                        {{ old('id_posisi') == $position->id ? 'selected' : '' }}>
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
                                id="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('tanggal_mulai') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_selesai"
                                class="form-control {{ $errors->has('tanggal_selesai') ? 'is-invalid' : '' }}"
                                id="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('tanggal_selesai') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file_sk" class="col-sm-4 col-form-label">File SK</label>
                        <div class="col-sm-8">
                            <input type="file" name="file_sk"
                                class="form-control {{ $errors->has('file_sk') ? 'is-invalid' : '' }}"
                                id="file_sk" value="{{ old('file_sk') }}">
                            <small class="text-secondary">
                                *) Format file .pdf
                            </small>
                            <div class="invalid-feedback">
                                {{ $errors->first('file_sk') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#id_pegawai').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Cari berdasarkan nama pegawai',
                    ajax: {
                        url: "{{ route('placement.create') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term,
                                type: 'employee',
                            };

                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.nama_lengkap + "(" + item.nip + ")",
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
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
            });

        </script>

        @if(old('id_pegawai')!=null)
            <script>
                const id_pegawai = "{{ old('id_pegawai') }}";
                const nama_pegawai =
                    "{{ App\Models\Employee::find(old('id_pegawai'))->nama_lengkap }}";
                $("#id_pegawai").html('<option value="' + id_pegawai + '" selected>' + nama_pegawai +
                    '</option>');

            </script>
        @endif

        @if(old('id_cabang')!=null)
            <script>
                const id_cabang = "{{ old('id_cabang') }}";
                const nama_cabang =
                    "{{ App\Models\Branch::find(old('id_cabang'))->cabang }}";
                $("#id_cabang").html('<option value="' + id_cabang + '" selected>' + nama_cabang +
                    '</option>');

            </script>
        @endif

    @endpush

</x-layout>
