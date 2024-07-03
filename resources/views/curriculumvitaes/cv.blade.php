@extends('layouts.main')

@section('title', 'MyAchievements | Curriculum Vitae')

@section('container')

<div class="print-area" id="printarea">
	<article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="row">
				    <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
				        
				    </div><!--//col-->
				    <div class="col">
						@if(isset($users))
							<div class="row p-2 justify-content-center justify-content-md-between">
							<h1 class="name mt-2 mb-1 text-white text-uppercase text-uppercase">{{ $users->fullname }}</h1>
						@else
							<div class="row p-2 justify-content-center justify-content-md-between">
							<h1 class="name mt-2 mb-1 text-white text-uppercase text-uppercase">My Name</h1>
						@endif
						@if(isset($profiles))
							<div class="title">{{ $profiles->expertise }}</div>
						@else
							<div class="title">No Data Available</div>
						@endif
							</div>
							<div class="row p-2 justify-content-center justify-content-md-between">
								<div class="col-md-5">
									<ul class="list-unstyled">
										@if(isset($users))
											<li class="mb-2"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>{{ $users->email }}</a></li>
										@else
											<li class="mb-2"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>#MyEmail@gmail.com</a></li>
										@endif
										@if(isset($profiles))
											<li><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>{{ $profiles->phone }}</a></li>
										@else
											<li><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>No Data Available</a></li>
										@endif
									</ul>
								</div>
								@if(isset($profiles))
									<div class="col-md-6">
										<ul class="resume-social list-unstyled">
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-linkedin fa-fw"></i></span>{{ $profiles->linkedin }}</a></li>
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-facebook fa-fw"></i></span>{{ $profiles->facebook }}</a></li>
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-instagram fa-fw"></i></span>{{ $profiles->instagram }}</a></li>
										</ul>
									</div>
								@else
									<div class="col-md-6">
										<ul class="resume-social list-unstyled">
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-linkedin fa-fw"></i></span>No Data Available</a></li>
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-facebook fa-fw"></i></span>No Data Available</a></li>
											<li class="mb-2"><span class="text-center me-2"><i class="bi bi-instagram fa-fw"></i></span>No Data Available</a></li>
										</ul>
									</div>
								@endif
							</div>
							
				    </div><!--//col-->
			    </div><!--//row-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
					@if(isset($profiles))
						<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">About Me</h2>
						<div class="resume-section-content">
							<p class="mb-0">{{ $profiles->branding }}</p>
						</div>
					@else
						<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">About Me</h2>
						<div class="resume-section-content">
							<p class="mb-0">No Data Available</p>
						</div>
					@endif
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-lg-9">
					    <section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
						    <div class="resume-section-content">
								@if(isset($works))
										@foreach ($works as $work)
											<div class="resume-timeline position-relative">
												<article class="resume-timeline-item position-relative pb-5">
													
													<div class="resume-timeline-item-header mb-2">
														<div class="d-flex flex-column flex-md-row">
															<h3 class="resume-position-title font-weight-bold mb-1">{{ $work->position }}</h3>
															<div class="resume-company-name ms-auto">{{ $work->company }}</div>
														</div><!--//row-->
														<div class="resume-position-time">{{ $work->start_tenure }} until {{ $work->end_tenure }}</div>
													</div><!--//resume-timeline-item-header-->
													<div class="resume-timeline-item-desc">
														<p>{{ $work->job_desc }}</p>
														<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
														<p>{{ $work->achievement_desc }}</p>
														<h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
														<ul class="list-inline">
															<li class="list-inline-item"><span class="badge bg-secondary badge-pill">{{ $work->tech }}</span></li>
														</ul>
													</div><!--//resume-timeline-item-desc-->

												</article><!--//resume-timeline-item-->
												
											</div><!--//resume-timeline-->
										@endforeach
								@else
									No Data Available
								@endif
						    </div>
					    </section><!--//experience-section-->
				    </div>
					<div class="col-lg-3">
						<section class="resume-section skills-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
								@if (isset($skills))
								<div class="resume-section-content">
										@foreach ($skills as $skill)
											<div class="resume-skill-item">
												<h4 class="resume-skills-cat font-weight-bold">{{ $skill->expertise_field }}</h4>
												<ul class="list-unstyled mb-4">
													<li class="mb-2">
														<div class="resume-skill-name">{{ $skill->tools }}</div>
													</li>
												</ul>
											</div><!--//resume-skill-item-->
										@endforeach
										<div class="resume-skill-item">
											<h4 class="resume-skills-cat font-weight-bold">Others</h4>
											@foreach ($skills as $skill)
												<ul class="list-inline">
													<li class="list-inline-item"><span class="badge badge-light">{{ $skill->other_skills }}</span></li>
												</ul>
											@endforeach
											</div><!--//resume-skill-item-->
										</div><!--resume-section-content-->
								@else
									No Data Available
								@endif      
						</section><!--//skills-section-->
					    <section class="resume-section education-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
								@if (isset($edus))
									@foreach ($edus as $edu)
										<div class="resume-section-content">
											<ul class="list-unstyled">
												<li class="mb-2">
													<div class="resume-degree font-weight-bold">{{ $edu->institution }}</div>
													<div class="resume-degree-org">{{ $edu->degree }}</div>
													<div class="resume-position-time">{{ $edu->start_period }} until {{ $edu->end_period }}</div>
												</li>
											</ul>
										</div>
									@endforeach
								@else
									No Data Available
								@endif
					    </section><!--//education-section-->
					    <section class="resume-section reference-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Awards</h2>
								@if (isset($sertifikats))
										@foreach ($sertifikats as $sertifikat)
											<div class="resume-section-content">
												<ul class="list-unstyled resume-awards-list">
													<li class="mb-2 ps-4 position-relative">
														<i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
														<div class="resume-award-name">{{ $sertifikat->event_name }}</div>
														<div class="resume-award-desc">{{ $sertifikat->description }}</div>
													</li>
												</ul>
											</div>
										@endforeach
								@else
									No Data Available
								@endif
					    </section><!--//interests-section-->
					    <section class="resume-section language-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Language</h2>
								@if (isset($languages))
										@foreach ($languages as $language)
											<div class="resume-section-content">
												<ul class="list-unstyled resume-lang-list">
													<li class="mb-2"><span class="resume-lang-name font-weight-bold">{{ $language->language }}</span>
													<small class="text-muted font-weight-normal">({{ $language->capability }})</small></li>
												</ul>
											</div>
										@endforeach
								@else
									No Data Available
								@endif
					    </section><!--//language-section-->
					    <section class="resume-section interests-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
								@if (isset($profiles))
										
											<div class="resume-section-content">
												<ul class="list-unstyled">
													<li class="mb-1">{{ $profiles->interest }}</li>
												</ul>
											</div>
										
								@else
									No Data Available
								@endif
					    </section><!--//interests-section-->
					    
				    </div>
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<!-- Tambahkan script untuk mengonversi halaman web ke PDF -->
<script>
    function generatePDF() {
        const element = document.getElementById('printarea'); // Ganti 'printarea' dengan ID yang sesuai
        const options = {
            filename: 'cv.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { format: 'a4', orientation: 'portrait' }
        };

        html2pdf()
		.from(element)
		.set({
			margin: [0, 0, 0, 0], // Atur margin atas, kanan, bawah, kiri (dalam mm)
			format: 'A4', // Atur ukuran kertas
			orientation: 'portrait' // Atur orientasi kertas (portrait atau landscape)
		})
		.save('cv.pdf');
    }
</script>

<!-- Tempatkan tombol di dalam tag form atau di luar jika tidak terkait dengan pengiriman form -->
<div class="col text-center mb-5">
    <button id="resumebutton" onclick="generatePDF()" class="btn btn-primary border-0">Download Curicullum Vitae</button>
</div>

@endsection
