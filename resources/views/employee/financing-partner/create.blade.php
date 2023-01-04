<x-layout>

    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-plus-circle"></i>
            </h1>
            <h1 class="h3 text-gray-800">Tambah Mitra</h1>
        </div>
    </x-slot:title>

    <div class="col-lg-7 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header">
                Data Mitra
            </div>
            <div class="card-body">
                <form action="{{ url('financing-partner') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                        <input type="text"
                            class="form-control
                            {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                            name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_lengkap') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch" class="col-form-label">Alamat</label>
                        <textarea name="alamat" id="alamat"
                            class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                            cols="30" rows="3">{{ old('alamat') }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten" class="col-form-label">Kabupaten</label>
                        <input type="text"
                            class="form-control
                            {{ $errors->has('kabupaten') ? 'is-invalid' : '' }}"
                            name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('kabupaten') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-form-label">Telepon</label>
                        <input type="number"
                            class="form-control
                            {{ $errors->has('telepon') ? 'is-invalid' : '' }}"
                            name="telepon" id="telepon" value="{{ old('telepon') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('telepon') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email (opsional)</label>
                        <input type="email"
                            class="form-control
                            {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            name="email" id="email" {{ old('email') }}>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text"
                            class="form-control
                            {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}"
                            name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('pekerjaan') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_terakhir" class="col-form-label">Pendidikan Terakhir</label>
                        <input type="text"
                            class="form-control
                            {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}"
                            name="pendidikan_terakhir" id="pendidikan_terakhir"
                            value="{{ old('pendidikan_terakhir') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('pendidikan_terakhir') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-form-label">Foto</label>
                        <input type="file" name="foto"
                            class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                            id="foto" value="{{ old('foto') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('foto') }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">
                        <i class="fas fa-fw fa-save"></i>
                        Tambah Mitra
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('js')

    @endpush

</x-layout>
