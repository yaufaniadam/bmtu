<x-layout>
    <x-slot:title>
        Data Pegawai
    </x-slot:title>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="mx-auto" style="max-width: 300px; max-height: 300px;min-width: 300px; min-height: 300px">
                <div class="img-thumbnail rounded-circle" style="background-image: url( {{ url('image?file='.$user->employee->foto) }});
                    background-size:cover;background-position: center;height: 300px;">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-3">
            <form action="{{ url('user/'.$user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="fullname" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_lengkap"
                            class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                            id="fullname" value="{{ $user->employee->nama_lengkap }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_lengkap') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8 d-flex">
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}"
                                type="radio" name="jenis_kelamin" id="pria" value="laki-laki"
                                {{ $user->employee->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pria">laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}"
                                type="radio" name="jenis_kelamin" id="wanita" value="perempuan"
                                {{ $user->employee->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="wanita">perempuan</label>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        @error('jenis_kelamin')
                            <small class="text-danger">
                                {{ $errors->first('jenis_kelamin') }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="place-of-birth" class="col-sm-4 col-form-label">Tempat lahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="tempat_lahir"
                            class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}"
                            id="place-of-birth" value="{{ $user->employee->tempat_lahir }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tempat_lahir') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-4 col-form-label">Tanggal lahir</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_lahir"
                            class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                            id="tanggal_lahir" value="{{ $user->employee->tanggal_lahir }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal_lahir') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" name="nip"
                            class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}"
                            id="nip" value="{{ $user->employee->nip }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nip') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label">No. Telp</label>
                    <div class="col-sm-8">
                        <input type="text" name="telepon"
                            class="form-control {{ $errors->has('telepon') ? 'is-invalid' : '' }}"
                            id="phone" value="{{ $user->employee->telepon }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('telepon') }}
                        </div>
                    </div>
                </div>

                @can('admin')
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select
                                class="custom-select {{ $errors->has('role') ? 'is-invalid' : '' }}"
                                name="role">
                                <option>Role Pegawai</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $user->role  == $role->id ? 'selected' : '' }}>
                                        {{ $role->role }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </div>
                        </div>
                    </div>
                @endcan

                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea
                            class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                            name="alamat" id="address" cols="30" rows="2">{{ $user->employee->alamat }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto"
                            class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                            id="foto" value="{{ old('foto') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('foto') }}
                        </div>
                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <label for="" class="col-sm-4 col-form-label d-flex flex-row">
                        {{ $user->email }}
                        <a class="ml-2" href="{{ route('edit-email',$user->id) }}">
                            <small><i class="fas fa-fw fa-edit"></i></small>
                        </a>
                    </label>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <label for="" class="col-sm-4 col-form-label d-flex flex-row">
                        <a href="{{ route('edit-password',$user->id) }}">
                            Ubah Password
                        </a>
                    </label>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label"></label>
                    <div for="" class="col-sm-4 d-flex flex-row">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="status" value="1"
                                {{ $user->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineCheckbox1">Aktif</label>
                        </div>
                    </div>
                </div>
                @can('admin')
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-warning btn-block">
                                <i class="fas fa-fw fa-save"></i>
                                Perbarui Data
                            </button>
                        </div>
                    </div>
                @endcan

            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <x-employee.family-member :employee-id="$user->employee->id" />
        </div>
        <div class="col-6">
            <x-employee.education-history :employee-id="$user->employee->id" />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <x-employee.achievement :employee-id="$user->employee->id" />
        </div>
    </div>

</x-layout>
