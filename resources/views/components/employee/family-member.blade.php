<div class="card">
    <div class="card-header">
        Anggota Keluarga
        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
            data-target="#createFamilyMemberModal">
            <i class="fas fa-fw fa-plus-circle"></i>
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <table class="table rounded overflow-hidden">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">L/P</th>
                    <th scope="col" class="text-center">TTL</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($families as $family)
                    <tr>
                        <td>
                            <small><b>{{ $family->nama }}</b></small>
                        </td>
                        <td>
                            <small><b>{{ $family->status }}</b></small>
                        </td>
                        <td class="text-center">
                            <small><b>{{ $family->jenis_kelamin }}</b></small>
                        </td>
                        <td class="text-center">
                            <small>
                                    <b>
                                        {{ $family->tempat_lahir }},
                                        {{ $family->tanggal_lahir->isoFormat('D MMM Y') }}
                                    </b>
                            </small>
                        </td>
                        <td class="d-flex align-items-center">
                            <small>
                                    <b>
                                        <a href="{{ route('family-member.edit',[$user_id,$family->id]) }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </b>
                            </small>
                            <small>
                                <b>
                                    <form
                                        onsubmit="return confirm('Data yang sudah dihapus tidak dapat dikembalikan. Lanjutkan?');"
                                        action="{{ route('family-member.destroy',[$user_id,$family->id]) }}"
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade show" id="createFamilyMemberModal" tabindex="-1" role="dialog"
    aria-labelledby="createFamilyMemberModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createFamilyMemberModalLongTitle">Tambah Anggota Keluarga</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('family-member.store',$user_id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pegawai" value="{{ $employee_id }}">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-5 col-form-label">Nama</span>
                        <div class="col-sm-7">
                            <input type="text" name="nama_keluarga"
                                class="form-control form-control-sm                                
                                {{ $errors->getbag("StoreFamilyMember")->has('nama_keluarga') ? 'is-invalid' : '' }}"
                                id="nama" value="{{ old('nama_keluarga') }}">
                            <div class="invalid-feedback">
                                {{ $errors->StoreFamilyMember->first('nama_keluarga') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="jenis_kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</span>
                        <div class="col-sm-7 d-flex align-items-center">
                            <div>
                                <div class="d-flex flex-row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin_keluarga"
                                            id="laki_laki" value="L"
                                            {{ old('jenis_kelamin_keluarga') == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Laki-laki">
                                            <span>L</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin_keluarga"
                                            id="perempuan" value="P"
                                            {{ old('jenis_kelamin_keluarga') == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Perempuan">
                                            <span>P</span>
                                        </label>
                                    </div>
                                </div>
                                @error('jenis_kelamin_keluarga','StoreFamilyMember')
                                    <small class="text-danger">
                                        {{ $errors->StoreFamilyMember->first('nama_keluarga') }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="status" class="col-sm-5 col-form-label">Status</span>
                        <div class="col-sm-7 d-flex align-items-center">
                            <div>
                                <div class="d-flex flex-row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_keluarga" id="anak"
                                            value="Anak"
                                            {{ old('status_keluarga') == 'Anak' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="anak">
                                            <span>Anak</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_keluarga" id="suami"
                                            value="Suami"
                                            {{ old('status_keluarga') == 'Suami' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="suami">
                                            <span>Suami</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="status_keluarga" id="istri"
                                            value="Istri"
                                            {{ old('status_keluarga') == 'Istri' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="istri">
                                            <span>Istri</span>
                                        </label>
                                    </div>
                                </div>
                                @error('status_keluarga','StoreFamilyMember')
                                    <small class="text-danger">
                                        {{ $errors->StoreFamilyMember->first('status_keluarga') }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="tempat_lahir" class="col-sm-5 col-form-label">Tempat Lahir</span>
                        <div class="col-sm-7">
                            <input type="text" name="tempat_lahir_keluarga"
                                class="form-control form-control-sm
                                {{ $errors->getbag("StoreFamilyMember")->has('tempat_lahir_keluarga') ? 'is-invalid' : '' }}"
                                id="tempat_lahir_keluarga" value="{{ old('tempat_lahir_keluarga') }}">
                            <div class="invalid-feedback">
                                {{ $errors->StoreFamilyMember->first('tempat_lahir_keluarga') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="tanggal_lahir" class="col-sm-5 col-form-label">Tanggal Lahir</span>
                        <div class="col-sm-7">
                            <input type="date" name="tanggal_lahir_keluarga"
                                class="form-control form-control-sm
                                {{ $errors->getbag("StoreFamilyMember")->has('tanggal_lahir_keluarga') ? 'is-invalid' : '' }}"
                                id="tanggal_lahir_keluarga"
                                value="{{ old('tanggal_lahir_keluarga') }}">
                            <div class="invalid-feedback">
                                {{ $errors->StoreFamilyMember->first('tanggal_lahir_keluarga') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="bpjs" class="col-sm-5 col-form-label">BPJS</span>
                        <div class="col-sm-7">
                            <div class="form-check">
                                <input id="bpjs"
                                    class="form-check-input
                                    {{ $errors->getbag("StoreFamilyMember")->has('bpjs_keluarga') ? 'is-invalid' : '' }}"
                                    type="checkbox" name="bpjs_keluarga" value="true">
                                <label class="form-check-label" for="bpjs_keluarga">
                                    <span>Ya</span>
                                </label>
                            </div>
                            @error('bpjs_keluarga','StoreFamilyMember')
                                <small class="text-danger">
                                    {{ $errors->StoreFamilyMember->first('bpjs_keluarga') }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <span for="bpjs_ketenagakerjaan" class="col-sm-5 col-form-label">BPJS Ketenagakerjaan</span>
                        <div class="col-sm-7">
                            <div class="form-check">
                                <input id="bpjs_ketenagakerjaan"
                                    class="form-check-input
                                    {{ $errors->getbag("StoreFamilyMember")->has('bpjs_ketenagakerjaan') ? 'is-invalid' : '' }}"
                                    type="checkbox" value="true" name="bpjs_ketenagakerjaan_keluarga">
                                <label class="form-check-label" for="bpjs_ketenagakerjaan_keluarga">
                                    <span>Ya</span>
                                </label>
                            </div>
                            @error('bpjs_ketenagakerjaan_keluarga','StoreFamilyMember')
                                <small class="text-danger">
                                    {{ $errors->StoreFamilyMember->first('bpjs_ketenagakerjaan_keluarga') }}
                                </small>
                            @enderror
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

@if($errors->hasBag("StoreFamilyMember"))
    @push('js')
        <script>
            $(function () {
                $("#createFamilyMemberModal").modal('show');
            });

        </script>
    @endpush
@endif
