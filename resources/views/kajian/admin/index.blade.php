<x-layout>
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet">
    @endpush

    <x-slot:title>
        Laporan Kajian
    </x-slot:title>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="form-group d-flex align-items-center">
                    <select class="form-control form-control-sm col-4 mr-3 filter" id="year">
                        <option value="">Pilih Tahun</option>
                        @if(!empty($years))
                            @foreach($years as $year)
                                <option value="{{ $year['id'] }}">
                                    {{ $year['id'] }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <select class="form-control form-control-sm col-4 mr-3 filter" id="month">
                        <option value="">Pilih Bulan</option>
                        @if(!empty($months))
                            @foreach($months as $month)
                                <option value="{{ $month['id'] }}">
                                    {{ $month['name'] }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <select class="form-control form-control-sm col-7 filter" id="employee">
                        <option value="">Pilih Pegawai</option>
                        @if(!empty($employees))
                            @foreach($employees as $employee)
                                <option value="{{ $employee['id'] }}">
                                    {{ $employee['name'] }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group d-flex align-items-center">
                    <span class="col-4 mr-0">Search</span>
                    <input type="text" name="term" id="term" class="form-control form-control-sm col-8">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table rounded overflow-hidden" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 25%">Nama</th>
                            <th scope="col" style="width: 25%" class="text-center">Tanggal</th>
                            <th scope="col">Faidah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            var month = $('#month').val();
            var year = $('#year').val();
            var table = $('#dataTable').DataTable({
                serverSide: true,
                searching: false,
                ordering: false,
                lengthChange: false,
                bInfo: false,
                language: {
                    paginate: {
                        next: "›",
                        previous: "‹",
                    }
                },
                pageLength: 10,
                ordering: false,
                columnDefs: [{
                    targets: 1,
                    className: "text-center"
                }],
                ajax: {
                    url: "{{ route('kajian.index') }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                        data.month = $('#month').val();
                        data.year = $('#year').val();
                        data.employee = $('#employee').val();
                    }
                },
                columns: [{
                        data: 'employeeName',
                        name: 'employeeName'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'faidah',
                        name: 'faidah'
                    },
                ]
            });

            function delay(fn, ms) {
                let timer = 0
                return function (...args) {
                    clearTimeout(timer)
                    timer = setTimeout(fn.bind(this, ...args), ms || 0)
                }
            }

            $(document).ready(function () {
                $('#term').keyup(delay(function () {
                    table.draw(true);
                }, 500));

                $(".filter").change(function () {
                    month = $('#month').val();
                    year = $('#year').val();
                    employee = $('#employee').val();
                    table.draw(true);
                });
            });

            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"

        </script>
    @endpush

</x-layout>
