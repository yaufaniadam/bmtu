<x-layout>
    <x-slot:title>
        Ubah Password
    </x-slot:title>

    <div class="card col-8 mx-auto">
        <div class="card-body">
            <form action="{{ route('update-password',$user_id) }}" method="POST">
                @csrf
                @method('PUT')
                @if(auth()->id() == $user_id)
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                id="password" name="password">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <hr>
                @endif
                <div class="form-group row">
                    <label for="new-password" class="col-sm-4 col-form-label">Password Baru</label>
                    <div class="col-sm-8">
                        <input type="password"
                            class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                            id="new-password" name="new_password">
                        <div class="invalid-feedback">
                            {{ $errors->first('new_password') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm-new-password" class="col-sm-4 col-form-label">Konfirmasi Password
                        Baru</label>
                    <div class="col-sm-8">
                        <input type="password"
                            class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"
                            id="confirm-new-password" name="new_password_confirmation">
                        <div class="invalid-feedback">
                            {{ $errors->first('new_password_confirmation') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
