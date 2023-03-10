<div class="card">
    <div class="card-header">
        Riwayat Pendidikan
        <button type="button" class="btn btn-warning btn-sm float-right" data-toggle="modal"
            data-target="#createEducationHistoryModal">
            <i class="fas fa-fw fa-plus-circle"></i>
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <table class="table rounded overflow-hidden">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Cabang</th>
                    <th scope="col" class="text-center">Mulai</th>
                    <th scope="col" class="text-center">Berakhir</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($placements as $placement)
                    <tr>
                        <td>
                            <small><b>{{ $placement->id_posisi }}</b></small>
                        </td>
                        <td>
                            <small>
                                <b>
                                    {{ $placement->id_cabang }}
                                </b>
                            </small>
                        </td>
                        <td class="text-center">
                            <small><b>{{ $placement->tanggal_mulai }}</b></small>
                        </td>
                        <td class="text-center">
                            <small><b>{{ $placement->tanggal_selesai }}</b></small>
                        </td>
                        <td class="d-flex align-items-center">
                            <small>
                                <b>
                                    <a href="">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                </b>
                            </small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
