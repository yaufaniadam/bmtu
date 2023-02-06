<x-layout>
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet">
    @endpush

    <x-slot:title>
        Marketing Report
    </x-slot:title>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="form-group d-flex align-items-center">
                    <span class="col-4 mr-0">Search</span>
                    <input type="text" name="term" id="term" class="form-control form-control-sm col-8">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table rounded overflow-hidden" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 50%">Nama</th>
                            <th scope="col" style="width: 20%">Jumlah Mitra</th>
                            <th scope="col" style="width: 20%">Mitra Akad</th>
                            <th scope="col" style="width: 10%"></th>
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
                    url: "{{ route('marketing-reports.index') }}",
                    type: "GET",
                    data: function (data) {
                        data.term = $('#term').val();
                        data.month = $('#month').val();
                        data.year = $('#year').val();
                    }
                },
                columns: [{
                        data: 'nama_lengkap',
                        name: 'nama_lengkap',
                        render: function (data) {
                            return data
                        }
                    },
                    {
                        data: 'reports',
                        name: 'reports'
                    },
                    {
                        data: 'finished_reports',
                        name: 'finished_reports'
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
