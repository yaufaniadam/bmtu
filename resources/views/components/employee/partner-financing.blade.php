@foreach($financing_histories as $history)
    <div class="card mb-3">
        <div class="card-header">
            Keterangan Pembiayaan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">Jenis Pembiayaan</div>
                <div class="col-9">{{ $history->jenis_pembiayaan }}</div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-3">Nama Marketing</div>
                <div class="col-9">{{ $history->employee->nama_lengkap }}</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">Tanggal</div>
                <div class="col-9">{{ $history->tanggal->isoFormat('D MMMM Y') }}</div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-3">Plafon Pembiayaan</div>
                <div class="col-9">Rp 30.000.000</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">Spesifikasi</div>
                <div class="col-9">{{ $history->keterangan }}</div>
            </div>
        </div>
    </div>

    <x-employee.marketing-cycle :financing-id="$history->id" />
@endforeach



<div class="mt-3">
    {{ $financing_histories->links() }}
</div>
