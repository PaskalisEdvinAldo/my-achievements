<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MyAchievements | About</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="#"><i class="bi bi-award-fill"></i>MyAchievements</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('landingpage') }}">Home</a></li>
                            <li class="nav-item {{ Request::is('/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                            <li class="nav-item {{ Request::is('features*') ? 'active' : '' }} dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Features</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('certificates.index') }}">Certificates</a></li>
                                    <li><a class="dropdown-item" href="{{ route('events.index') }}">Events</a></li>
                                    <li><a class="dropdown-item" href="{{ route('curriculumvitaes.index') }}">Curriculum Vitae</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="py-5">
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder mb-3">Benefits of using MyAchievements.</h1>    
                            </div>
                        </div>
                    </div>
                    <p class="lead fw-normal text-muted mb-4 text-left">
                        <i>MyAchievements</i> is a digital platform developed to facilitate students in managing their academic and non-academic achievements, as well as their skill certifications. Additionally, <i>MyAchievements</i> can serve as a platform for disseminating information about competitions or the development of soft and hard skills that students can participate in.<br><br>

                        Another advantage of using the <i>MyAchievements</i> website is that students can monitor their performance and activity in achieving various accomplishments on a monthly, yearly, or even per-category basis. Furthermore, students can create Curriculum Vitae for graduation requirements and job applications.<br><br>

                        The hope behind the development of the <i>MyAchievements</i> website is not only to simplify the management and mapping of students' achievements but also to have an impact on improving the school's accreditation.
                    </p>
                </div>
            </header>
            <!-- About section one-->
            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('img/guru.jpg') }}" style="width: 600px; height: 400px;" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Our Visions</h2>
                            <p class="lead fw-normal text-muted mb-0">Becoming a leading Vocational High School in Electronics, Informatics, and Quality Animation that Aligns with Community Interests.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About section two-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('img/guru_murid.jpg') }}" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Our Missions</h2>
                            <p class="lead fw-normal text-muted mb-0">
                                <ul>
                                    <li>Implementing science and technology based on religious values.</li>
                                    <li>Providing education and training relevant to the needs of the business/industrial community.</li>
                                    <li>Establishing collaborations with the business/industrial community.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder mb-5">Developers</h2>
                        
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="{{ asset('img/Prof Hakkun.png') }}" style="width: 175px; height: 130px;" alt="..." />
                                <h5 class="fw-bolder">Prof. H. Hakkun Elmunsyah, S.T., M.T.</h5>
                                <div class="fst-italic text-muted">Electrical Engineering and Informatics Department Lecture at Malang State University</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="{{ asset('img/mine.png') }}" style="width: 175px; height: 130px;" alt="..." />
                                <h5 class="fw-bolder">Paskalis Edvin Aldo Krisrama Pratama</h5>
                                <div class="fst-italic text-muted">Undergraduate student of Informatics Engineering Education at Malang State University.</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="text-center"><div class="small m-0 text-white">Copyright &copy; MyAchievements 2024</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
