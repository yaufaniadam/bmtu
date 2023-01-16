<div class="card">
    <div class="card-header">
        Prestasi
        @can('admin')
            <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
                data-target="#createAchievementModal">
                <i class="fas fa-fw fa-plus-circle"></i>
                Tambah Data
            </button>
        @endcan
    </div>
    <div class="card-body">
        <table class="table rounded overflow-hidden">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Keterangan</th>
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($achievements as $achievement)
                    <tr>
                        <td>
                            <small><b>{{ $achievement->prestasi }}</b></small>
                        </td>
                        <td class="text-center">
                            <small><b>{{ $achievement->tanggal->isoFormat('D MMMM Y') }}</b></small>
                        </td>
                        <td class="d-flex align-items-center">
                            <small>
                                <b>
                                    <a
                                        href="{{ route('achievement.edit',[$user_id,$achievement->id]) }}">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                </b>
                            </small>

                            <small>
                                <b>
                                    <form
                                        onsubmit="return confirm('Data yang sudah dihapus tidak dapat dikembalikan. Lanjutkan?');"
                                        action="{{ route('achievement.destroy',[$user_id,$achievement->id]) }}"
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

@can('admin')
    <div class="modal fade show" id="createAchievementModal" tabindex="-1" role="dialog"
        aria-labelledby="createAchievementModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="createAchievementModalLongTitle">Tambah Prestasi Pegawai</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('achievement.store',$user_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pegawai" value="{{ $employee_id }}">
                        <div class="form-group row">
                            <span for="prestasi" class="col-sm-5 col-form-label">Prestasi</span>
                            <div class="col-sm-7">
                                <input type="text" name="prestasi"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreAchievement")->has('prestasi') ? 'is-invalid' : '' }}"
                                    id="prestasi" value="{{ old('prestasi') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreAchievement->first('prestasi') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="tanggal" class="col-sm-5 col-form-label">Tanggal</span>
                            <div class="col-sm-7">
                                <input type="date" name="tanggal"
                                    class="form-control form-control-sm
                                {{ $errors->getbag("StoreAchievement")->has('tanggal') ? 'is-invalid' : '' }}"
                                    id="tanggal" value="{{ old('tanggal') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->StoreAchievement->first('tanggal') }}
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

    @if($errors->hasBag("StoreAchievement"))
        @push('js')
            <script>
                $(function () {
                    $("#createAchievementModal").modal('show');
                });

            </script>
        @endpush
    @endif
@endcan
