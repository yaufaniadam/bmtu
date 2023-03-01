<x-layout>
    <x-slot:title>
        Detail Mitra
    </x-slot:title>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-5">
        <div class="col-6 mx-auto">
            <div class="d-flex flex-row align-items-center mb-3">
                <div class="mr-3">
                    <div class="" style="max-width: 80px; max-height: 80px;min-width: 80px; min-height: 80px">
                        <div class="img-thumbnail rounded-circle" style="background-image: url( {{ asset($partner->foto) }});
                        background-size:cover;background-position: center;height: 80px;">
                        </div>
                    </div>
                </div>
                <div class="">
                    <h6 class="mb-0"><b>{{ $partner->nama_lengkap }}</b></h6>
                    <span>ID Mitra : {{ $partner->id }}</span><br>
                    <span>Nama Marketing : {{ $partner->employee->nama_lengkap }}</span><br>
                    <span>{{ $partner->alamat }}</span><br>
                    <span>{{ $partner->telepon }}</span>
                </div>
            </div>
        </div>
        @can('admin')
            @push('css')
                <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
                    rel="stylesheet">
            @endpush

            <div class="col-9 mx-auto">
                <div class="card mb-3">
                    <div class="card-header">
                        Pembiayaan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border-bottom border-left border-right mx-auto" width="100%"
                                cellspacing="0" id="dataTable">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jenis Pembiayaan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Marketing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @push('js')
                <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}">
                </script>
                <script>
                    $('#dataTable').DataTable({
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
                            url: "{{ route('financing-partner.show',$partner->id) }}",
                        },
                        columns: [{
                                data: 'no',
                                name: 'no',
                            },
                            {
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                            {
                                data: 'jenis_pembiayaan',
                                name: 'jenis_pembiayaan',
                                render: function (data) {
                                    return data
                                }
                            },
                            {
                                data: 'status',
                                name: 'status'
                            },
                            {
                                data: 'marketing',
                                name: 'marketing'
                            },
                        ]
                    });

                </script>
            @endpush
        @else
            <div class="col-6 mx-auto">
                <a href="{{ route('financing.create',$partner->id) }}"
                    class="btn btn-block btn-sm btn-warning mb-3">
                    <i class="fas fa-fw fa-plus-circle"></i>
                    Pembiayaan Baru
                </a>
                <x-employee.partner-financing :partner-id="$partner->id" />
            </div>
        @endcan
    </div>


</x-layout>
