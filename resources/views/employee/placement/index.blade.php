<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-users"></i>
            </h1>
            <h1 class="h3 text-gray-800">SK Penempatan</h1>
        </div>
    </x-slot:title>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Berakhir</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($placements as $placement)
                            <tr>
                                <td>{{ $placement->position['posisi'] }}</td>
                                <td>{{ $placement->tanggal_mulai }}</td>
                                <td>{{ $placement->tanggal_selesai }}</td>
                                <td>
                                    <a href="{{ asset($placement->file_sk) }}">
                                        <i class="fas fa-fw fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $placements->links() }}
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @endpush
</x-layout>
