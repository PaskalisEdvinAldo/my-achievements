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
                <a href="{{ route('curriculumvitaes.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate CV</a>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $academicCount }}</div>
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nonAcademicCount }}</div>
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
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $competitionActivities }}</div>
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
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $nonCompetitionActivities }}</div>
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

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
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
            </div>
            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Performance Graph by Month</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                {!! $achievementsChart->container() !!}
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
                                {!! $achievementsTypeChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Performance Graph by Year</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                {!! $achievementsChartByYear->container() !!}
                            </div>
                        </div>
                    </div>             

                </div>

                <div class="col-lg-6 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Work Experiences</h6>
                        </div>
                        <div class="card-body">
                            @if (isset($works))
								@foreach ($works as $work)
                                <p><i class="bi bi-briefcase-fill text-gray-500"></i> {{ $work->position }} at {{ $work->company }}</p>
                                @endforeach
							@else
								No Data Available
							@endif
                        </div>
                    </div>    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Awards</h6>
                        </div>
                        <div class="card-body">
                            @if (isset($sertifikats))
								@foreach ($sertifikats as $sertifikat)
                                    <p><i class="resume-award-icon fas fa-trophy" data-fa-transform="shrink-2"></i> {{ $sertifikat->event_name }}</p>
                                    {{-- <p class="mb-3"> {{ $resume->award_desc }}</p> --}}
                                @endforeach
							@else
								No Data Available
							@endif
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

<script src="{{ $achievementsChart->cdn() }}"></script>

{{ $achievementsChart->script() }}

<script src="{{ $achievementsTypeChart->cdn() }}"></script>

{{ $achievementsTypeChart->script() }}

<script src="{{ $achievementsChartByYear->cdn() }}"></script>

{{ $achievementsChartByYear->script() }}

<script src="{{ $achievementsTotalChart->cdn() }}"></script>

{{ $achievementsTotalChart->script() }}

@endsection