<x-layout>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
                {{-- {{ $placements->links() }} --}}
            </div>
        </div>
    </div>
</x-layout>
