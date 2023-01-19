<x-layout>
    <x-slot:title>
        Buat Laporan Kajian Baru
    </x-slot:title>

    <div class="" style="min-height: 75vh">
        <form class="m-3 d-flex flex-column justify-content-between h-100" method="POST"
            action="{{ route('kajian.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal">
                </div>
                <div class="form-group">
                    <label for="faidah">Tuliskan faidah kajian yang Anda ikuti</label>
                    <textarea class="form-control" name="faidah" id="faidah" cols="10" rows="20"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-warning btn-block">Submit</button>
        </form>
    </div>

</x-layout>
