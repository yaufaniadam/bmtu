<div class="card">
    <div class="card-header">
        Riwayat Pendidikan
        @can('admin')
            <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                data-target="#createEducationHistoryModal">
                <i class="fas fa-fw fa-plus-circle"></i>
                Tambah Data
            </button>
        @endcan
    </div>
    <div class="card-body">
        <table class="table rounded overflow-hidden">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Jenjang</th>
                    <th scope="col">Lembaga</th>
                    <th scope="col" class="text-center">Tahun</th>
                    <th scope="col" class="text-center">Ijazah</th>
                    @can('admin')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach($education_histories as $education_history)
                    <tr>
                        <td>
                            <small><b>{{ $education_history->pendidikan }}</b></small>
                        </td>
                        <td>
                            <small><b>
                                    {{ $education_history->jurusan }}
                                    {{ $education_history->nama_lembaga_pendidikan }}
                                </b>
                            </small>
                        </td>
                        <td class="text-center">
                            <small><b>{{ $education_history->tahun }}</b></small>
                        </td>
                        <td class="text-center">
                            <small>
                                <b>
                                    <a
                                        href="{{ url('image?file='.$education_history->file_ijazah) }}">
                                        <i class="fas fa-fw fa-file-pdf"></i>
                                    </a>
                                </b>
                            </small>
                        </td>
                        @can('admin')
                            <td class="d-flex align-items-center">
                                <small>
                                    <b>
                                        <a
                                            href="{{ route('education.edit',[$user_id,$education_history->id]) }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </b>
                                </small>
                                <small>
                                    <b>
                                        <form
                                            onsubmit="return confirm('Data yang sudah dihapus tidak dapat dikembalikan. Lanjutkan?');"
                                            action="{{ route('education.destroy',[$user_id,$education_history->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger btn btn-sm">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </b>
                                </small>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@can('admin')
    <div class="modal fade show" id="createEducationHistoryModal" tabindex="-1" role="dialog"
        aria-labelledby="createEducationHistoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="createEducationHistoryModalLongTitle">Tambah Riwayat Pendidikan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('education.store',$user_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pegawai" value="{{ $employee_id }}">
                        <div class="form-group row">
                            <span for="pendidikan" class="col-sm-5 col-form-label">Jenjang</span>
                            <div class="col-sm-7">
                                <select
                                    class="form-control form-control-sm {{ $errors->getbag("StoreEducation")->has('pendidikan') ? 'is-invalid' : '' }}"
                                    id="pendidikan" name="pendidikan">
                                    <option>Pilih Jenjang Pendidikan</option>
                                    @foreach($level_of_educations as $level_of_education)
                                        <option value="{{ $level_of_education['value'] }}"
                                            {{ old('pendidikan') == $level_of_education['value'] ? 'selected' : '' }}>
                                            {{ $level_of_education['value'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->StoreEducation->first('pendidikan') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama_lembaga_pendidikan" class="col-sm-5 col-form-label">Lembaga</span>
                            <div class="col-sm-7">
                                <input type="text" name="nama_lembaga_pendidikan"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreEducation")->has('nama_lembaga_pendidikan') ? 'is-invalid' : '' }}"
                                    id="nama_lembaga_pendidikan"
                                    value="{{ old('nama_lembaga_pendidikan') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreEducation->first('nama_lembaga_pendidikan') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="jurusan" class="col-sm-5 col-form-label">Jurusan</span>
                            <div class="col-sm-7">
                                <input type="text" name="jurusan"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreEducation")->has('jurusan') ? 'is-invalid' : '' }}"
                                    id="jurusan" value="{{ old('jurusan') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreEducation->first('jurusan') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="tahun" class="col-sm-5 col-form-label">Tahun Lulus</span>
                            <div class="col-sm-7">
                                <input type="text" name="tahun"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreEducation")->has('tahun') ? 'is-invalid' : '' }}"
                                    id="tahun" value="{{ old('tahun') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreEducation->first('tahun') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="file_ijazah" class="col-sm-5 col-form-label">File Ijazah</span>
                            <div class="col-sm-7">
                                <input type="file" name="file_ijazah"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreEducation")->has('file_ijazah') ? 'is-invalid' : '' }}"
                                    id="file_ijazah" value="{{ old('file_ijazah') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreEducation->first('file_ijazah') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-warning btn-sm btn-block">
                                    <i class="fas fa-fw fa-save"></i>
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($errors->hasBag("StoreEducation"))
        @push('js')
            <script>
                $(function () {
                    $("#createEducationHistoryModal").modal('show');
                });

            </script>
        @endpush
    @endif
@endcan
