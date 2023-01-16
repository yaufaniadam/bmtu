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
                <small>Jumlah Mitra : 200</small><br>
                <small>Akad : 20</small>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
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
            $('#dataTable').DataTable({
                serverSide: true,
                // searching: false,
                pageLength: 5,
                ordering: false,
                ajax: {
                    url: "{{ route('marketing-reports.show',$employee->id) }}",
                },
                columns: [
                    // {
                    //     data: 'detail',
                    //     name: 'detail',
                    //     render: function (data) {
                    //         return data
                    //     }
                    // },
                    {
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
                        data: 'phone',
                        name: 'phone'
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

        </script>
    @endpush

</x-layout>
