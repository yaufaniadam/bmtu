<x-layout>
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet">
    @endpush

    <x-slot:title>
        Gaji
    </x-slot:title>

    <div class="d-flex mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rekap Gaji Bulanan
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="form-group d-flex align-items-center">
                            <span class="col-4 mr-0 px-0">Search</span>
                            <input type="text" name="term" id="term" class="form-control form-control-sm col-8">
                        </div>
                        <div class="form-group d-flex align-items-center px-3">
                            <select class="form-control form-control-sm col-6 filter" id="year">
                                <option value="">Pilih Tahun</option>
                                @foreach($salary_report_years as $item)
                                    <option value="{{ $item->tahun }}"
                                        {{ $item->tahun == $requested_year ? 'selected' : '' }}>
                                        {{ $item->tahun }}</option>
                                @endforeach
                            </select>
                            <select class="form-control form-control-sm col-6 ml-3 filter" id="month">
                                <option value="">Pilih Bulan</option>
                                @foreach($months as $id=>$item)
                                    <option value="{{ $id }}"
                                        {{ $id == $requested_month ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table rounded overflow-hidden" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 30%">Nama</th>
                                    <th>NIK</th>
                                    <th>Gaji Tetap</th>
                                    <th>Gaji Variabel</th>
                                    <th>Potongan</th>
                                    <th>Total</th>
                                    {{-- <th>Cuti</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
                pageLength: 5,
                ordering: false,
                ajax: {
                    url: "{{ route('salary.index') }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                        data.month = $('#month').val();
                        data.year = $('#year').val();
                    }
                },
                columns: [{
                        data: 'employee_name',
                        name: 'employee_name',
                        render: function (data) {
                            return data;
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'basic_salary',
                        name: 'basic_salary'
                    },
                    {
                        data: 'variable_salary',
                        name: 'variable_salary'
                    },
                    {
                        data: 'salary_cuts',
                        name: 'salary_cuts'
                    },
                    {
                        data: 'total_salary',
                        name: 'total_salary'
                    },
                    // {
                    //     data: 'paid_leave',
                    //     name: 'paid_leave'
                    // },
                    // {
                    //     data: 'detail',
                    //     name: 'detail',
                    //     render: function (data) {
                    //         return data
                    //     }
                    // },
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
                    table.draw(true);
                    console.log(month, year)
                });
            });

        </script>
    @endpush
</x-layout>
