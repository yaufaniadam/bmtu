<div class="card">
    <div class="card-header">
        Riwayat Penempatan
    </div>
    <div class="card-body">
        <form action="{{ route('marketing-reports.show',$employee_id) }}" method="GET">
            @csrf
            <input type="button" value="">
            <input type="text" name="test" id="" class="form-control">
            <button type="submit">asd</button>
        </form>
        <table class="table rounded overflow-hidden">
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
                @foreach($marketing_reports as $marketing_report)
                    <tr>
                        <td>{{ $marketing_report->partner->nama_lengkap }}</td>
                        <td>{{ $marketing_report->tanggal->isoFormat('MMMM') }}</td>
                        <td>{{ $marketing_report->tanggal->isoFormat('Y') }}</td>
                        <td>{{ $marketing_report->jenis_pembiayaan }}</td>
                        <td></td>
                        <td>{{ $marketing_report->partner->telepon }}</td>
                        <td>{{ $marketing_report->partner->alamat }}</td>
                        <td><i class="fas fa-fw fa-eye"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $marketing_reports->links() }}
    </div>
</div>
