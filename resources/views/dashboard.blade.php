<x-layout>

    <x-slot:title>
        Dashboard
    </x-slot:title>

    @can('admin')

        <div class="row">



        </div>

    @endcan

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12">
            <div class="card mb-4">
                <!-- Card Body -->
                <div class="card-body">

                    @can('admin')
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ url('user') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/pegawai.png') }}" />
                                        <p>Pegawai</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a class="nav-link" href="{{ url('placement') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/sk-penempatan.png') }}" />
                                        <p>SK Penempatan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('attendance.create') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/presensi.png') }}" />
                                        <p>Presensi</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('salary.create') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/gaji.png') }}" />
                                        <p>Gaji</p>
                                    </div>
                                </a>
                            </div>


                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('marketing-reports.index') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/marketing-report.png') }}" />
                                        <p>Marketing Report</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('financing-partner.index') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/mitra-pembiayaan.png') }}" />
                                        <p>Mitra Pembiayaan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('kajian.index') }}">
                                    <div class="text-center">
                                        <img src="{{ asset('img/kajian.png') }}" />
                                        <p>Kajian</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <div class="text-center">
                                    <img src="{{ asset('img/info.png') }}" />
                                    <p>Informasi</p>
                                </div>
                            </div>

                        </div>
                    @endcan

                    @can('employee')
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('salary.employee-salary') }}">
                                    <div class="text-center menu rounded">
                                        <img src="{{ asset('img/gaji.png') }}" />
                                        <p>Gaji</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('attendance.index') }}">
                                    <div class="text-center menu rounded">
                                        <img src="{{ asset('img/presensi.png') }}" />
                                        <p>Presensi</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('placement.index') }}">
                                    <div class="text-center menu rounded">
                                        <img src="{{ asset('img/sk-penempatan.png') }}" />
                                        <span>SK Penempatan</span>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-xl-3 col-lg-3 col-4"> --}}
                            {{-- <a href="{{ route('marketing-reports.index') }}">
                            --}}
                            {{-- <div class="text-center menu rounded"> --}}
                            {{-- <img src="{{ asset('img/marketing-report.png') }}"
                            /> --}}
                            {{-- <p>Marketing Report</p> --}}
                            {{-- </div> --}}
                            {{-- </a> --}}
                            {{-- </div> --}}
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('financing-partner.index') }}">
                                    <div class="text-center menu rounded">
                                        <img src="{{ asset('img/mitra-pembiayaan.png') }}" />
                                        <p>Mitra Pembiayaan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-4">
                                <a href="{{ route('kajian.index') }}">
                                    <div class="text-center menu rounded">
                                        <img src="{{ asset('img/kajian.png') }}" />
                                        <p>Kajian</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    @endcan
                </div>
            </div>
        </div>


    </div>



    @push('js')
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    @endpush
</x-layout>
