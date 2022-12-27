<x-layout>
    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-trophy"></i>
            </h1>
            <h1 class="h3 text-gray-800">Edit Prestasi</h1>
        </div>
    </x-slot:title>

    <div class="card col-7 mx-auto">
        <div class="card-body">
            <form action="{{ route('achievement.update',[$user_id,$achievement->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="fullname" class="col-sm-4 col-form-label">Prestasi</label>
                    <div class="col-sm-8">
                        <input type="text" name="prestasi"
                            class="form-control {{ $errors->has('prestasi') ? 'is-invalid' : '' }}"
                            id="fullname" value="{{ $achievement->prestasi }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('prestasi') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-4 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal"
                            class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}"
                            id="tanggal" value="{{ $achievement->tanggal->format('Y-m-d') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal') }}
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</x-layout>
