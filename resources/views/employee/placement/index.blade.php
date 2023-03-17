<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        SK Penempatan
    </x-slot:title>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border-right border-left border-bottom">
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
                                    <a href="{{ url('image?file='.$placement->file_sk) }}">
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
