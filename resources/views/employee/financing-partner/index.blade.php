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
                <div class="d-flex justify-content-end">
                    <form action="{{ route('financing-partner.index') }}" method="GET">
                        @csrf
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="term" id="term" class="form-control form-control-sm mr-2"
                                placeholder="cari nama mitra...">
                            <button type="submit" class="btn btn-success btn-sm">submit</button>
                        </div>
                    </form>
                </div>
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

</x-layout>
