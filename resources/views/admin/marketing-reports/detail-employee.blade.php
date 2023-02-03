<x-layout>
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet">
    @endpush

    <x-slot:title>
        Marketing Report
    </x-slot:title>

    <div class="col-6 mx-auto">
        <div class="d-flex flex-row align-items-center mb-3">
            <div class="col-3">
                <div class="" style="max-width: 100px; max-height: 100px;min-width: 100px; min-height: 100px">
                    <div class="img-thumbnail rounded-circle" style="background-image: url( {{ asset($employee->foto) }});
                        background-size:cover;background-position: center;height: 100px;">
                    </div>
                </div>
            </div>
            <div class="col-9 text-dark">
                <h6 class="mb-0"><b>{{ $employee->nama_lengkap }}</b></h6>
                <small>Jumlah Mitra : {{ $employee->partners->count() }}</small><br>
                <small>Akad : {{ $employee->marketingReportsDone->count() }}</small>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="form-group d-flex align-items-center">
                    <select class="form-control form-control-sm col-6 mr-3 filter" id="year">
                        <option value="">Pilih Tahun</option>
                        @if(!empty($years))
                            @foreach($years as $year)
                                <option value="{{ $year['id'] }}">
                                    {{ $year['id'] }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <select class="form-control form-control-sm col-6 filter" id="month">
                        <option value="">Pilih Bulan</option>
                        @if(!empty($months))
                            @foreach($months as $month)
                                <option value="{{ $month['id'] }}">
                                    {{ $month['name'] }}
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
                            <th scope="col" style="width: 20%">Nama</th>
                            <th scope="col">Bulan</th>
                            <th scope="col" class="text-center">Tahun</th>
                            <th scope="col" style="width: 20%">Jenis Pembiayaan</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Telp</th>
                            <th scope="col" class="text-center" style="width: 30%">Alamat</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
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
                pageLength: 5,
                ordering: false,
                ajax: {
                    url: "{{ route('marketing-reports.show',$employee->id) }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                        data.month = $('#month').val();
                        data.year = $('#year').val();
                    }
                },
                columns: [{
                        data: 'partnerName',
                        name: 'partnerName'
                    },
                    {
                        data: 'month',
                        name: 'month'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'jenis_pembiayaan',
                        name: 'jenis_pembiayaan'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'detail',
                        name: 'detail',
                        render: function (data) {
                            return data
                        }
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
                    table.draw(true);
                    console.log(month, year)
                });
            });

        </script>
    @endpush

</x-layout>
