<x-layout>
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet">
    @endpush

    <x-slot:title>
        Users
    </x-slot:title>

    <div class="mb-2">
        <a href="{{ url('user/create') }}" class="btn btn-success">
            <i class="fas fa-fw fa-plus-circle"></i> Tambah Pegawai
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
                            <th>Nama Lengkap</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th></th>
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
                ajax: {
                    url: "{{ url('user') }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                    }
                },
                columns: [{
                        data: 'detail',
                        name: 'detail',
                        render: function (data) {
                            return data
                        }
                    },
                    {
                        data: 'employee.telepon',
                        name: 'employee.telepon'
                    },
                    {
                        data: 'employee.email',
                        name: 'employee.email',
                    },
                    {
                        data: 'delete',
                        name: 'delete',
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

            $('#term').keyup(delay(function () {
                table.draw(true);
            }, 500));

        </script>
    @endpush
</x-layout>
