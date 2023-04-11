<x-layout>
    @push('css')
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <x-slot:title>
        Presensi
    </x-slot:title>

    <div class="col-7 mx-auto mb-3">
        <div class="card">
            <div class="card-header">
                Import Rekap Presensi
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('attendance.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4">Bulan</span>
                        <select name="bulan" id="bulan" class="form-control col-5">
                            <option value="">1</option>
                        </select>
                    </div> --}}
                    <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4">File Excel</span>
                        <div class="col-7 row">
                            <input type="file" name="file_excel" id="excel"
                                class="form-control {{ $errors->has('file_excel') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('file_excel') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4"></span>
                        <button class="btn btn-warning"><i class="fa-solid fa-upload"></i> Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="card">
            <div class="card-header">
                Cari berdasarkan Pegawai
            </div>
            <div class="card-body">
                <form action="">
                    <div class="d-flex align-items-center">
                        <div class="col-7">
                            <span>Nama Pegawai</span>
                            <select
                                class="js-example-basic-single form-control mt-3
                                {{ $errors->has('id_pegawai') ? 'is-invalid' : '' }}"
                                name="id_pegawai" id="id_pegawai">
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('id_pegawai') }}
                            </div>
                        </div>
                        <div class="col-4">
                            <span>Bulan</span>
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @foreach($months as $key => $month)
                                    <option value="{{ $key }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center mt-3">
                        <span for="bulan" class="col-4"></span>
                        <button class="btn btn-warning btn-block" id="employee_attendance_detail">
                            <i class="fa-solid fa-clipboard-user"></i>
                            Tampilkan Presensi
                        </button>
                        <span for="bulan" class="col-4"></span>
                    </div>
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
                        url: "{{ route('attendance.create') }}",
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
                                        text: item.nama_lengkap + "(" + item
                                            .nama_panggilan + ")",
                                        id: item.nama_panggilan
                                    }
                                })
                            };
                        }
                    }
                });

                $("#employee_attendance_detail").click(function () {
                    event.preventDefault();
                    let nama_panggilan = $("#id_pegawai").val()
                    let month = $("#bulan").val()
                    let url = `/attendance/show/${nama_panggilan}/${month}`;
                    let php_url = "{{ url('') }}" + url;
                    // console.log(php_url);
                    window.location.href = php_url;
                });

            });

        </script>
    @endpush

</x-layout>
