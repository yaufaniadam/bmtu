<x-layout>
    <x-slot:title>
        Gaji
    </x-slot:title>

    <div class="col-7 mx-auto mb-3">
        <div class="card">
            <div class="card-header">
                Import Rekap Gaji
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('salary.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d-flex align-items-center">
                        <span for="month" class="col-4">Bulan</span>
                        <select name="month" id="month" class="form-control col-4">
                            <option value="">Pilih Bulan</option>
                            @foreach($months as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <span for="year" class="col-4">Tahun</span>
                        <input type="number" name="year" id="" class="form-control col-4">
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <span for="excel" class="col-4">File Excel</span>
                            <input type="file" name="file_excel" id="excel" class="form-control col-7">
                        </div>
                        <div class="row mt-1">
                            <span for="excel" class="col-4"></span>
                            <small class="col-7">
                                *) format file .xslx
                            </small>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <span class="col-4"></span>
                        <button class="btn btn-warning">
                            <i class="fa-solid fa-upload"></i>
                            Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="card">
            <div class="card-header">
                Lihat Rekap Gaji
            </div>
            <div class="card-body">
                <div class="d-flex align-items-end">
                    <div class="col-3">
                        <span>Tahun</span>
                        <select name="tahun" id="tahun" class="form-control mt-3">
                            <option value="">Pilih Tahun</option>
                            @if(!empty($salary_report_years))
                                @foreach($salary_report_years as $year)
                                    <option value="{{ $year->tahun }}">{{ $year->tahun }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-6">
                        <span>Bulan</span>
                        <select name="bulan" id="bulan" class="form-control mt-3">
                            <option value="">Pilih Bulan</option>
                            @foreach($months as $id=>$month)
                                <option value="{{ $id }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 d-flex">
                        {{-- <a href="{{ route('salary.index',1) }}"
                        class="btn btn-warning"> --}}
                        {{-- <i class="fa-solid fa-clipboard-user"></i> --}}
                        {{-- Tampilkan --}}
                        {{-- </a> --}}
                        <button class="btn btn-warning" id="show_salary_document">
                            <i class="fa-solid fa-clipboard-user"></i>
                            Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $("#show_salary_document").click(function () {
                let year = $("#tahun").val()
                let month = $("#bulan").val()
                let url = `/salary/index?year=${year}&month=${month}`;
                let php_url = "{{ url('') }}" + url;
                window.location.href = php_url;
            });

        </script>
    @endpush

</x-layout>
