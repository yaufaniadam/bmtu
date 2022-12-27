<?php
 public static function PlacementIndex()
    {
        $model = Placement::select(
            'tr_penempatan.*',
            'tr_pegawai.nama_lengkap as employee_name',
            'tr_pegawai.foto as employee_photo',
            'tr_pegawai.nip as employee_idcard',
            'mstr_cabang.cabang as branch',
            'mstr_posisi.posisi as position',
            DB::raw("DATEDIFF(day,GETDATE(),tr_penempatan.tanggal_selesai) as remaining_days"),
        )
            ->leftJoin('tr_pegawai', 'tr_pegawai.id', '=', 'tr_penempatan.id_pegawai')
            ->leftJoin('mstr_cabang', 'mstr_cabang.id', '=', 'tr_penempatan.id_cabang')
            ->leftJoin('mstr_posisi', 'mstr_posisi.id', '=', 'tr_penempatan.id_posisi');
        // ->orderBy('remaining_days');

        $placements = DataTables::eloquent($model)
            ->addColumn('photo', function ($employee) {
                return view('datatables.photo')->with(['src' => $employee->employee_photo]);
            })
            ->editColumn('remaining_days', function ($employee) {
                return $employee->remaining_days;
            })
            ->toJson();

        // if (empty($placements)) {
        //     return "Daftar Kosong";
        // }

        return $placements;
    }