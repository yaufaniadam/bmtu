<x-layout>

    <x-slot:title>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 d-none">Dashboard</h1>
        </div>
    </x-slot:title>

    @can('admin')

    <div class="row">
        

        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Mitra Pembiayaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Akad</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
                            <div class="text-center">
                                <img src="{{ asset('img/presensi.png') }}" />
                                <p>Presensi</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center">
                                <img src="{{ asset('img/gaji.png') }}" />
                                <p>Gaji</p>
                            </div>
                        </div>
                        
                    
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center">
                                <img src="{{ asset('img/marketing-report.png') }}" />
                                <p>Marketing Report</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center">
                                <img src="{{ asset('img/mitra-pembiayaan.png') }}" />
                                <p>Mitra Pembiayaan</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center">
                                <img src="{{ asset('img/kajian.png') }}" />
                                <p>Kajian</p>
                            </div>
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
                            <div class="text-center menu">
                                <img src="{{ asset('img/gaji.png') }}" />
                                <p>Gaji</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center menu">
                                <img src="{{ asset('img/presensi.png') }}" />
                                <p>Presensi</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center menu">
                                <img src="{{ asset('img/sk-penempatan.png') }}" />
                                <p>SK Penempatan</p>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center menu">
                                <img src="{{ asset('img/marketing-report.png') }}" />
                                <p>Marketing Report</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center menu">
                                <img src="{{ asset('img/mitra-pembiayaan.png') }}" />
                                <p>Mitra Pembiayaan</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-4">                            
                            <div class="text-center menu">
                                <img src="{{ asset('img/kajian.png') }}" />
                                <p>Kajian</p>
                            </div>
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
