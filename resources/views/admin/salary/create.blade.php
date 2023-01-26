<x-layout>
    <x-slot:title>
        Gaji
    </x-slot:title>

    <div class="col-7 mx-auto mb-3">
        <div class="card">
            <div class="card-header">
                Import Rekap Gaji
            </div>
            <div class="card-body">
                <form action="{{ route('salary.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
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
                        <button class="btn btn-warning">
                            <i class="fa-solid fa-upload"></i>
                            Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="card">
            <div class="card-header">
                Lihat Rekap Gaji
            </div>
            <div class="card-body">
                <form action="">
                    <div class="d-flex align-items-end">
                        <div class="col-3">
                            <span>Tahun</span>
                            <select name="tahun" id="tahun" class="form-control mt-3">
                                <option value="">Pilih Tahun</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <span>Bulan</span>
                            <select name="bulan" id="bulan" class="form-control mt-3">
                                <option value="">Pilih Bulan</option>
                            </select>
                        </div>
                        <div class="col-3 d-flex">
                            <a href="{{ route('salary.index',1) }}" class="btn btn-warning">
                                <i class="fa-solid fa-clipboard-user"></i>
                                Tampilkan
                            </a>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center mt-3">


                        <span for="bulan" class="col-4"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
