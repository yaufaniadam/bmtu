<x-layout>

    <x-slot:title>
        Marketing Report
    </x-slot:title>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table rounded overflow-hidden">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Jumlah Mitra</th>
                            <th scope="col" class="text-center">Mitra Akad</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->nama_lengkap }}
                                </td>
                                <td class="text-center">{{ $employee->marketingReports->count() }}</td>
                                <td class="text-center">{{ $employee->marketingReports->count() }}</td>
                                <td>
                                    <a
                                        href="{{ route('marketing-reports.show',$employee->id) }}">
                                        <i class="fas fa-fw fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $employees->links() }}
            </div>
        </div>
    </div>


</x-layout>
