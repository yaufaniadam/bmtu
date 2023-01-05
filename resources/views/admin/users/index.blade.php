<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-users"></i>
            </h1>
            <h1 class="h3 text-gray-800">Daftar Pegawai</h1>
        </div>
    </x-slot:title>

    <div class="mb-2">
        <a href="{{ url('user/create') }}" class="btn btn-success">
            <i class="fas fa-fw fa-plus-circle"></i> Tambah
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
            $('#dataTable').DataTable({
                serverSide: true,
                // searching: false,
                ajax: {
                    url: "{{ url('user') }}",
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
                        name: 'employee.email'
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

            // $.ajax({
            //     url: "{{ url('user') }}",
            //     success: function (data) {
            //         console.log(data.data[0].employee.email);
            //     }
            // })

        </script>
    @endpush
</x-layout>
