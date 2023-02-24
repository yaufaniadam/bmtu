<x-layout>
    <x-slot:title>
        Presensi
    </x-slot:title>

    <div class="d-flex mb-3">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Presensi {{ $employee_name }}</span>
                        <span>{{ $selected_month }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <div class="dropdown">
                            <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Pilih bulan
                            </a>

                            <div class="dropdown-menu">
                                @foreach($months as $key => $month)
                                    <a class="dropdown-item"
                                        href="{{ route('attendance.show',[$nip,$key]) }}">{{ $month }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <table class="table rounded overflow-hidden border-top border-bottom">
                        <thead class="bg-light">
                            <tr>
                                <th>Tanggal</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam Masuk</th>
                                <th class="text-center">Jam Pulang</th>
                                <th class="text-center">Terlambat</th>
                                <th class="text-center">Hadir</th>
                                <th class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>
                                        {{ $attendance->tanggal->isoFormat('D MMMM') }}
                                    </td>
                                    <td class="text-center">
                                        {{ $attendance->tanggal->isoFormat('dddd') }}
                                    </td>
                                    <td class="text-center">{{ $attendance->jam_masuk }}</td>
                                    <td class="text-center">{{ $attendance->jam_pulang }}</td>
                                    <td class="text-center">
                                        {{ $attendance->terlambat == "" ? '-' : $attendance->terlambat }}
                                    </td>
                                    <td class="text-center text-success">
                                        @if($attendance->hadir == "ya")
                                            <i class="fa-regular fa-circle-check"></i>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($attendance->keterangan != "")
                                            <span class="badge badge-danger" data-toggle="modal" data-target="#ketModal"
                                                id="{{ $attendance->id }}">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="mx-4 mb-4 mt-3">
                    <small class="text-warning">REKAP</small>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Hadir</small>
                        <small>{{ $attendance_summary['day_in'] }}</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Izin</small>
                        <small>1</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Cuti</small>
                        <small>0</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Alpa</small>
                        <small>0</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <small>Terlambat</small>
                        <small>{{ $attendance_summary['late'] }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ketModal" tabindex="-1" aria-labelledby="ketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ketModalLabel">Alasan tidak hadir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="keterangan"></p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).on('shown.bs.modal', '#ketModal', function (event) {
                var triggerElement = $(event.relatedTarget);
                var triggerElementId = triggerElement.attr('id');
                let php_url = "{{ $url }}";
                $.ajax({
                    url: `${php_url}?keterangan=${triggerElementId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $("#keterangan").html(data.keterangan)
                    }
                });
            });

        </script>
    @endpush
</x-layout>
