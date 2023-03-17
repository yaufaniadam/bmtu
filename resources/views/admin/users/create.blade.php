<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        Tambah Pegawai
    </x-slot:title>

    <div class="col-lg-7 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header">
                Data Pegawai
            </div>
            <div class="card-body">
                <form action="{{ url('user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_lengkap"
                                class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                                id="fullname" value="{{ old('nama_lengkap') }}">
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
                                    {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="pria">laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}"
                                    type="radio" name="jenis_kelamin" id="wanita" value="perempuan"
                                    {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
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
                        <label for="fullname" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="number" name="nip"
                                class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}"
                                id="fullname" value="{{ old('nip') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('nip') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="place-of-birth" class="col-sm-4 col-form-label">Tempat lahir</label>
                        <div class="col-sm-8">
                            <input type="text" name="tempat_lahir"
                                class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}"
                                id="place-of-birth" value="{{ old('tempat_lahir') }}">
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
                                id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('tanggal_lahir') }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label">No. Telp</label>
                        <div class="col-sm-8">
                            <input type="text" name="telepon"
                                class="form-control {{ $errors->has('telepon') ? 'is-invalid' : '' }}"
                                id="phone" value="{{ old('telepon') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('telepon') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label">Foto Pegawai</label>
                        <div class="col-sm-8">
                            <input type="file" name="foto"
                                class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                id="foto" value="{{ old('foto') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('foto') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select
                                class="custom-select {{ $errors->has('role') ? 'is-invalid' : '' }}"
                                name="role">
                                <option>Role Pegawai</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role') == $role->id ? 'selected' : '' }}>
                                        {{ $role->role }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea
                                class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                name="alamat" id="address" cols="30"
                                rows="2">{{ old('alamat') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('alamat') }}
                            </div>
                        </div>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                id="password">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation"
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                id="password_confirmation">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
