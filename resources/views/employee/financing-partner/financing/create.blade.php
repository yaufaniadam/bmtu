<x-layout>

    <x-slot:title>
        Tambah Pembiayaan
    </x-slot:title>

    <div class="col-lg-7 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header">
                Data Pembiayaan
            </div>
            <div class="card-body">
                <form action="{{ route('financing.store',$partner_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_mitra_pembiayaan" value="{{ $partner_id }}">
                    <div class="form-group">
                        <label for="jenis_pembiayaan" class="col-form-label">Jenis Pembiayaan</label>
                        <input type="text"
                            class="form-control
                            {{ $errors->has('jenis_pembiayaan') ? 'is-invalid' : '' }}"
                            name="jenis_pembiayaan" id="jenis_pembiayaan"
                            value="{{ old('jenis_pembiayaan') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('jenis_pembiayaan') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch" class="col-form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan"
                            class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}"
                            cols="30" rows="3">{{ old('keterangan') }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('keterangan') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-form-label">Nominal</label>
                        <input type="number"
                            class="form-control
                            {{ $errors->has('nominal') ? 'is-invalid' : '' }}"
                            name="nominal" id="nominal" value="{{ old('nominal') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('nominal') }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">
                        <i class="fas fa-fw fa-save"></i>
                        Tambah Pembiayaan
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('js')

    @endpush

</x-layout>
