<x-layout>
    <x-slot:title>
        Edit Riwayat Pendidikan
    </x-slot:title>

    <div class="card col-7 mx-auto">
        <div class="card-body">
            <form action="{{ route('education.update',[$user_id,$education->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-4 col-form-label">Jenjang</label>
                    <div class="col-sm-8">
                        <select
                            class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}"
                            id="pendidikan" name="pendidikan">
                            <option>Pilih Jenjang Pendidikan</option>
                            @foreach($level_of_educations as $level_of_education)
                                <option value="{{ $level_of_education['value'] }}"
                                    {{ $education->pendidikan == $level_of_education['value'] ? 'selected' : '' }}>
                                    {{ $level_of_education['value'] }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('pendidikan') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_lembaga_pendidikan" class="col-sm-4 col-form-label">Lembaga</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_lembaga_pendidikan"
                            class="form-control {{ $errors->has('nama_lembaga_pendidikan') ? 'is-invalid' : '' }}"
                            id="nama_lembaga_pendidikan" value="{{ $education->nama_lembaga_pendidikan }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_lembaga_pendidikan') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <input type="text" name="jurusan"
                            class="form-control {{ $errors->has('jurusan') ? 'is-invalid' : '' }}"
                            id="jurusan" value="{{ $education->jurusan }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('jurusan') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-4 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-8">
                        <input type="number" name="tahun"
                            class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}"
                            id="tahun" value="{{ $education->tahun }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tahun') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file_ijazah" class="col-sm-4 col-form-label">File Ijazah</label>
                    <div class="col-sm-5">
                        <input type="file" name="file_ijazah"
                            class="form-control {{ $errors->has('file_ijazah') ? 'is-invalid' : '' }}"
                            id="file_ijazah" value="{{ $education->file_ijazah }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('file_ijazah') }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ asset($education->file_ijazah) }}" class="btn btn-danger">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-fw fa-file-pdf"></i>
                                Download
                            </div>
                        </a>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</x-layout>
