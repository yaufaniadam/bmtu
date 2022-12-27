<x-layout>
    <x-slot:title>
        <div class="d-flex mb-3">
            <h1 class="h4 text-gray-800 mr-1">
                <i class="fas fa-fw fa-user"></i>
            </h1>
            <h1 class="h3 text-gray-800">Edit Data Anggota Keluarga</h1>
        </div>
    </x-slot:title>

    <div class="card col-7 mx-auto">
        <div class="card-body">
            <form
                action="{{ route('family-member.update',[$user_id,$family_member->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama"
                            class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                            id="nama" value="{{ $family_member->nama }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        <div>
                            <div class="d-flex flex-row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                        value="L"
                                        {{ $family_member->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin">L</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                        value="P"
                                        {{ $family_member->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin">P</label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <small class="text-danger">
                                    {{ $errors->first('jenis_kelamin') }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <span for="status" class="col-sm-4 col-form-label">Status</span>
                    <div class="col-sm-8 d-flex align-items-center">
                        <div>
                            <div class="d-flex flex-row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="anak" value="Anak"
                                        {{ $family_member->status == 'Anak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="anak">
                                        <span>Anak</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="suami" value="Suami"
                                        {{ $family_member->status == 'Suami' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="suami">
                                        <span>Suami</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="status" id="istri" value="Istri"
                                        {{ $family_member->status == 'Istri' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="istri">
                                        <span>Istri</span>
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <small class="text-danger">
                                    {{ $errors->first('status') }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="tempat_lahir"
                            class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}"
                            id="tempat_lahir" value="{{ $family_member->tempat_lahir }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tempat_lahir') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_lahir"
                            class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                            id="tanggal_lahir"
                            value="{{ $family_member->tanggal_lahir->format('Y-m-d') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal_lahir') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bpjs" class="col-sm-4 col-form-label">BPJS</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="bpjs" name="bpjs" value="true"
                                {{ $family_member->bpjs == 'Ya' ? 'checked' : '' }}>
                            <label class="form-check-label" for="bpjs">Ya</label>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('bpjs') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bpjs_ketenagakerjaan" class="col-sm-4 col-form-label">BPJS Ketenagakerjaan</label>
                    <div class="col-sm-8 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="bpjs_ketenagakerjaan"
                                name="bpjs_ketenagakerjaan" value="true"
                                {{ $family_member->bpjs_ketenagakerjaan == 'Ya' ? 'checked' : '' }}>
                            <label class="form-check-label" for="bpjs_ketenagakerjaan">Ya</label>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('bpjs_ketenagakerjaan') }}
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</x-layout>
