<x-layout>
    <x-slot:title>
        Mitra
    </x-slot:title>

    <div class="mb-2">
        <a href="{{ url('financing-partner/create') }}" class="btn btn-secondary">
            <i class="fas fa-fw fa-plus-circle"></i> Tambah Mitra
        </a>
    </div>

    @can('admin')
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-right border-left border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Bulan</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Marketing</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($partners))
                                @foreach($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->nama_lengkap }}</td>
                                        <td>{{ $partner->created_at->isoFormat('MMMM') }}</td>
                                        <td>{{ $partner->created_at->isoFormat('Y') }}</td>
                                        <td>{{ $partner->employee->nama_lengkap }}</td>
                                        <td><a
                                                href="{{ route('financing-partner.show',$partner->id) }}">
                                                <i class="fas fa-fw fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                Mitra tidak ditemukan.
                            @endif
                        </tbody>
                    </table>
                    {{ $partners->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-right border-left border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($partners))
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
                            @else
                                <tr>Mitra tidak ditemukan.</tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $partners->links() }}
                </div>
            </div>
        </div>
    @endcan

</x-layout>
