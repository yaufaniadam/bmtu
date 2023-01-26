<x-layout>
    <x-slot:title>
        Presensi
    </x-slot:title>

    <div class="d-flex mb-3">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    Presensi
                </div>
                <div class="card-body">
                    <table class="table rounded overflow-hidden border-top border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Terlambat</th>
                                <th>Hadir</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="mx-4 mb-4 mt-3">
                    <small class="text-warning">REKAP</small>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Hadir</small>
                        <small>24</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Izin</small>
                        <small>1</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Cuti</small>
                        <small>0</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Alpa</small>
                        <small>0</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Terlambat</small>
                        <small>1</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
