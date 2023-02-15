<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        SK Penempatan
    </x-slot:title>

    <div class="mb-2">
        <a href="{{ url('placement/create') }}" class="btn btn-warning">
            <i class="fas fa-fw fa-plus-circle"></i> Tambah Data
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="form-group d-flex align-items-center">
                    <span class="col-4 mr-0">Search</span>
                    <input type="text" name="term" id="term" class="form-control form-control-sm col-8">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Mulai</th>
                            <th>Berakhir</th>
                            <th>Sisa</th>
                            <th>Status</th>
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
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}">
        </script> --}}
        <script>
            let table = $('#dataTable').DataTable({
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
                "columnDefs": [{
                    className: "align-middle",
                    "targets": [1, 2, 3, 4, 5, 6]
                }],
                serverSide: true,
                // searching: false,
                ajax: {
                    url: "{{ url('placement') }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                    }
                },
                order: [
                    [6, "asc"]
                ],
                columns: [{
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        render: function (data) {
                            return data
                        }
                    },
                    {
                        data: 'employee_name',
                        name: 'employee_name',
                        orderable: false,
                        render: function (data) {
                            return data
                        }
                    },
                    {
                        data: 'employee_idcard',
                        name: 'employee_idcard',
                        orderable: false,
                    },
                    {
                        data: 'position',
                        name: 'position',
                        orderable: false,
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai',
                        orderable: false,
                    },
                    {
                        data: 'tanggal_selesai',
                        name: 'tanggal_selesai',
                        orderable: false,
                    },
                    {
                        data: 'remaining_days',
                        name: 'remaining_days',
                        // render: function (data) {
                        //     return data + " hari"
                        // }
                    },
                    {
                        data: 'status_penempatan',
                        name: 'status_penempatan',
                        orderable: false,
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

            $('#term').keyup(delay(function () {
                table.draw(true);
            }, 500));

        </script>
    @endpush
</x-layout>
