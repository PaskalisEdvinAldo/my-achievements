<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'MyAchievements')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link id="theme-style" rel="stylesheet" href="{{ asset('css/cv/pillar.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uploadstyle.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@20.0.5/build/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    {{-- <link rel="stylesheet" href="css/profilestyle.css"> --}}
    {{-- <link rel="stylesheet" href="css/styles.css"> --}}
    {{-- <link href="css/styles.css" rel="stylesheet" /> --}}
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
</head>
<body id="page-top">
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('landingpage') }}">
                <div class="sidebar-brand-icon rotate-n-10">
                    <i class="bi bi-award-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-2">MyAchievements</div>
            </a>
        
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
        
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboards*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ auth()->user()->is_admin ? route('dashboardadmins.index') : route('dashboards.index') }}">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span></a>
            </li>
        
            @if(!auth()->user()->is_admin)
                <!-- Divider -->
                <hr class="sidebar-divider">
        
                <!-- Heading -->
                <div class="sidebar-heading">
                    Features
                </div>
        
                <!-- Nav Item - Certificates -->
                <li class="nav-item {{ Request::is('certificates*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('certificates.index') }}">
                        <i class="bi bi-trophy-fill"></i>
                        <span>Certificates</span>
                    </a>
                </li>
        
                <!-- Nav Item - Events -->
                <li class="nav-item {{ Request::is('events*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
                       aria-expanded="true" aria-controls="collapseEvents">
                        <i class="bi bi-calendar-event-fill"></i>
                        <span>Events</span>
                    </a>
                    <div id="collapseEvents" class="collapse {{ Request::is('events*') ? 'show' : '' }}" aria-labelledby="headingEvents"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Events Options:</h6>
                            <a class="collapse-item {{ Request::is('events') ? 'active' : '' }}" href="{{ route('events.index') }}">Event Registration</a>
                            <a class="collapse-item {{ Request::is('events/show') ? 'active' : '' }}" href="{{ route('events.show') }}">Event Summary</a>
                        </div>
                    </div>
                </li>
        
                <hr class="sidebar-divider">
        
                <!-- Heading -->
                <div class="sidebar-heading">
                    Outputs
                </div>
        
                <!-- Nav Item - Achievements Summary -->
                <li class="nav-item {{ Request::is('summarys*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="{{ route('summarys.index') }}" data-target="#collapsePages"
                       aria-expanded="true" aria-controls="collapsePages">
                        <i class="bi bi-clipboard2-check-fill"></i>
                        <span>Achievements Summary</span>
                    </a>
                </li>
        
                <!-- Nav Item - Curriculum Vitae -->
                <li class="nav-item {{ Request::is('curriculumvitaes*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCurriculumVitae"
                       aria-expanded="true" aria-controls="collapseCurriculumVitae">
                        <i class="bi bi-file-earmark-person-fill"></i>
                        <span>Curriculum Vitae</span>
                    </a>
                    <div id="collapseCurriculumVitae" class="collapse {{ Request::is('curriculumvitaes*') ? 'show' : '' }}" aria-labelledby="headingCurriculumVitae"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">CV Completeness Options:</h6>
                            <a class="collapse-item {{ Request::is('curriculumvitaes/createWork') ? 'active' : '' }}" href="{{ route('curriculumvitaes.createWork') }}">Work Experiences</a>
                            <a class="collapse-item {{ Request::is('curriculumvitaes/createSkill') ? 'active' : '' }}" href="{{ route('curriculumvitaes.createSkill') }}">Skills & Tools</a>
                            <a class="collapse-item {{ Request::is('curriculumvitaes/createEducation') ? 'active' : '' }}" href="{{ route('curriculumvitaes.createEducation') }}">Educations</a>
                            <a class="collapse-item {{ Request::is('curriculumvitaes/createLanguage') ? 'active' : '' }}" href="{{ route('curriculumvitaes.createLanguage') }}">Languages</a>
                            <a class="collapse-item {{ Request::is('curriculumvitaes/show') ? 'active' : '' }}" href="{{ route('curriculumvitaes.show') }}">Completeness Summary</a>
                        </div>
                    </div>
                </li>
        
                <hr class="sidebar-divider d-none d-md-block">
        
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            @endif
        </ul>
        

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <span class="text-gray-600 small">Our Social Media:</span>
                            <a href="https://smkn2-singosari.sch.id/" class="btn-circle btn-sm bg-dark m-1"><i class="bi bi-globe" style="color: white"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="btn-circle btn-sm bg-dark m-1"><i class="bi bi-instagram" style="color: white"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.youtube.com/channel/UC0B8cIUqCnHMzoTNXxbRhFQ" class="btn-circle btn-sm bg-dark m-1"><i class="bi bi-youtube" style="color: white"></i></a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>
                    
                    <ul class="navbar-nav my-auto">
                        <li class="nav-item">
                            <img src="{{ asset('img/smkn2singosari.png') }}" width="40px" class="mr-3">
                            <span class="text-gray-900 lg">SMK NEGERI 2 SINGOSARI</span>
                        </li>
                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(isset($users))
                                    
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, {{ $users->nickname }}</span>
                                    
                                @else
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Greetings!</span>
                                @endif
                                    <img class="img-profile rounded-circle"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profiles.index') }}">
                                    <i class="bi bi-person-vcard-fill bi-sm bi-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    User Information
                                </a>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="bi bi-box-arrow-left text-gray-400"></i>
                                    Logout
                                </button>
                            </div>
                        </li>
                    </ul>
                </nav>
                        
                        <!-- Begin Page Content -->
                        @yield('container')
                        
                        @yield('lombacontainer')
                        
                        <!-- /.container-fluid -->
                        
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MyAchievements 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="bi bi-chevron-up"></i>
            </a>
            
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-primary" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    
    <!-- Page level plugins -->
    <script src="{{ asset('chart/Chart.min.js') }}"></script>

</html>