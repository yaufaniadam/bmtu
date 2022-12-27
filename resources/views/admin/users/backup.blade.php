<div class="card-body">
    <form action="{{ url('user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="username" class="col-sm-4 col-form-label">Nama Pengguna</label>
            <div class="col-sm-8">
                <p id="username" class="col-form-label">{{ $user->name }}</p>
            </div>
        </div>
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

        <hr class="sidebar-divider d-none d-md-block">

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <a href="{{ route('edit-email',$user->id) }}" class="btn btn-primary">Change
                    Email Address</a>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <a href="{{ route('edit-password',$user->id) }}" class="btn btn-primary">Change
                    Password</a>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-block">Simpan</button>
    </form>
</div>