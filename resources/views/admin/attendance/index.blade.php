<x-layout>
    <x-slot:title>
        Presensi
    </x-slot:title>

    <div class="col-7 mx-auto mb-3">
        <div class="card">
            <div class="card-header">
                Import Rekap Presensi
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4">Bulan</span>
                        <select name="bulan" id="bulan" class="form-control col-5">
                            <option value="">1</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4">File Excel</span>
                        <input type="file" name="file_excel" id="" class="form-control col-7">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <span for="bulan" class="col-4"></span>
                        <button class="btn btn-warning"><i class="fa-solid fa-upload"></i> Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="card">
            <div class="card-header">
                Cari berdasarkan Pegawai
            </div>
            <div class="card-body">
                <form action="">
                    <div class="d-flex align-items-center">
                        <div class="col-7">
                            <span>Nama Pegawai</span>
                            <input type="text" name="" id="" class="form-control mt-3">
                        </div>
                        <div class="col-4">
                            <span>Bulan</span>
                            <select name="bulan" id="bulan" class="form-control mt-3">
                                <option value="">Pilih Bulan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center mt-3">
                        <span for="bulan" class="col-4"></span>
                        <button class="btn btn-warning btn-block">
                            <i class="fa-solid fa-clipboard-user"></i>
                            Tampilkan Presensi
                        </button>
                        <span for="bulan" class="col-4"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
