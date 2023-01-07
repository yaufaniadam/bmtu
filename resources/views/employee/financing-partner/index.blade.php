<x-layout>
    <x-slot:title>
        Mitra
    </x-slot:title>

    <div class="mb-2">
        <a href="{{ url('financing-partner/create') }}" class="btn btn-secondary">
            <i class="fas fa-fw fa-plus-circle"></i> Tambah Mitra
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td><a
                                        href="{{ route('financing-partner.show',$partner->id) }}">
                                        {{ $partner->nama_lengkap }}
                                    </a>
                                </td>
                                <td>{{ $partner->alamat }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $partners->links() }}
            </div>
        </div>
    </div>
</x-layout>
