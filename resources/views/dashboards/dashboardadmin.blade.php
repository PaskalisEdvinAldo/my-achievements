@extends('layouts.main')

@section('title', 'MyAchievements | Dashboard')

@section('container')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                {{-- <a href="{{ route('curriculumvitaes.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate CV</a> --}}
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Academic Achievements</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAcademicCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-easel2-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Non Academic Achievements</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalNonAcademicCount }}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="bi bi-book-half fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Competition Activities
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalCompetitionActivities }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-mortarboard-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Non Competition Activities
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalNonCompetitionActivities }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-palette-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">School's Performance Graph by Year</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                {!! $achievementsTotalChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Achievements Type Graph</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                {!! $achievementsTypeTotalChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-lg-12 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">School's Achievements Summary</h6>
                        </div>
                        <div class="card-body">
                            @if($totalAcademicCount > $totalNonAcademicCount)
                                <p>Total Prestasi Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold; color: blue;">{{ $totalAcademicCount }}</span>
                                </p>
                                <p>Total Prestasi Non Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold; color: red;">{{ $totalNonAcademicCount }}</span>
                                </p>
                            @elseif($totalAcademicCount < $totalNonAcademicCount)
                                <p>Total Prestasi Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold; color: red;">{{ $totalAcademicCount }}</span>
                                </p>
                                <p>Total Prestasi Non Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold; color: blue;">{{ $totalNonAcademicCount }}</span>
                                </p>
                            @else
                                <p>Total Prestasi Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold;">{{ $totalAcademicCount }}</span>
                                </p>
                                <p>Total Prestasi Non Akademik yang dimiliki sekolah sebanyak 
                                    <span style="font-weight: bold;">{{ $totalNonAcademicCount }}</span>
                                </p>
                            @endif
                        
                            @if($totalAcademicCount > $totalNonAcademicCount)
                                <p>Dengan demikian prestasi yang total prestasi yang 
                                    <span style="color: darkgreen; font-weight: bold;">mendominasi</span> 
                                    yaitu 
                                    <span style="color: darkgreen; font-weight: bold;">PRESTASI AKADEMIK</span> 
                                    sehingga sekolah perlu  
                                    <span style="color: orange; font-weight: bold;">meningkatkan</span>
                                    <span style="color: orange; font-weight: bold;">PRESTASI NON AKADEMIK</span>.
                                </p>
                            @elseif($totalAcademicCount < $totalNonAcademicCount)
                                <p>Dengan demikian prestasi yang total prestasi yang 
                                    <span style="color: darkgreen; font-weight: bold;">mendominasi</span>  
                                    yaitu 
                                    <span style="color: darkgreen; font-weight: bold;">PRESTASI NON AKADEMIK</span> 
                                    sehingga sekolah perlu 
                                    <span style="color: orange; font-weight: bold;">meningkatkan</span>.
                                    <span style="color: orange; font-weight: bold;">PRESTASI AKADEMIK</span>.
                                </p>
                            @else
                                <p>Prestasi akademik dan non akademik sekolah memiliki jumlah yang sama. Sekolah perlu meningkatkan keduanya secara seimbang.</p>
                            @endif

                            <h6>Siswa-siswi peraih prestasi terbanyak:</h6>
                            <ol>
                                @foreach($topStudents as $student)
                                    <li>{{ $student->fullname }} - {{ $student->sertifikat_count }} Prestasi</li>
                                @endforeach
                            </ol>
                        </div>
                        
                    </div>    
                </div>
                <div class="col-lg-6 mb-4">
                    <!-- Approach -->
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>

<script src="{{ $achievementsTotalChart->cdn() }}"></script>

{{ $achievementsTotalChart->script() }}

<script src="{{ $achievementsTypeTotalChart->cdn() }}"></script>

{{ $achievementsTypeTotalChart->script() }}

@endsection