@extends('layouts.main')

@section('title', 'MyAchievements | CV Completeness Summary')

@section('container')

    @if(session()->has('success'))
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    <div class="alert alert-success alert-dismissible d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    </div>
    @endif

    <!-- Work Experience Summary -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Work Experiences</h1>
        </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Work Experiences History</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="workexperience" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Position</th>
                                        <th>Start Tenure</th>
                                        <th>End Tenure</th>
                                        <th>Achievements</th>
                                        <th>Technologies Used</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if(isset($works) && $works->isNotEmpty())
                                        @foreach($works as $work)
                                            <tr>
                                                @if($work->company)
                                                    <td>{{ $work->company }}</td>
                                                @endif
                                                @if($work->position)
                                                    <td>{{ $work->position }}</td>
                                                @endif
                                                @if($work->start_tenure)
                                                    <td>{{ $work->start_tenure }}</td>
                                                @endif
                                                @if($work->end_tenure)
                                                    <td>{{ $work->end_tenure }}</td>
                                                @endif
                                                @if($work->achievement_desc)
                                                    <td>{{ $work->achievement_desc }}</td>
                                                @endif
                                                @if($work->tech)
                                                    <td>{{ $work->tech }}</td>
                                                @endif
                                                <td>
                                                        <div>
                                                            <a href="{{ route('curriculumvitaes.editWork', ['user_id' => $work->user_id, 'id' => $work->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                                <i class="bi bi-pencil-square"></i>
                                                                <span>Update</span>
                                                            </a>
                                                            <form action="{{ route('curriculumvitaes.destroy', ['user_id' => $work->user_id, 'type' => 'work', 'id' => $work->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-work-id="{{ $work->id }}">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>
    <!-- End of Work Experience Summary -->

    <!-- Skills & Tools Summary -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Skills & Tools</h1>
        </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Skills $ Utilized Tools</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="skill" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Field of Expertise</th>
                                        <th>Utilized Tools</th>
                                        <th>Other Skills/Tools</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if(isset($skills) && $skills->isNotEmpty())
                                        @foreach($skills as $skill)
                                            <tr>
                                                @if($skill->expertise_field)
                                                    <td>{{ $skill->expertise_field }}</td>
                                                @endif
                                                @if($skill->tools)
                                                    <td>{{ $skill->tools }}</td>
                                                @endif
                                                @if($skill->other_skills)
                                                    <td>{{ $skill->other_skills }}</td>
                                                @endif
                                                <td>
                                                    <div>
                                                        <a href="{{ route('curriculumvitaes.editSkill', ['user_id' => $skill->user_id, 'id' => $skill->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span>Update</span>
                                                        </a>
                                                        <form action="{{ route('curriculumvitaes.destroy', ['user_id' => $skill->user_id, 'type' => 'skill', 'id' => $skill->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-skill-id="{{ $skill->id }}">
                                                                <i class="bi bi-trash-fill"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>
    <!-- End of Skills & Tools Summary -->
    
    <!-- Education Summary -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Education</h1>
        </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Educations History</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="education" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Institution</th>
                                        <th>Degree</th>
                                        <th>Start Period</th>
                                        <th>End Period</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if(isset($edus) && $edus->isNotEmpty())
                                        @foreach($edus as $edu)
                                            <tr>
                                                @if($edu->institution)
                                                    <td>{{ $edu->institution }}</td>
                                                @endif
                                                @if($edu->degree)
                                                    <td>{{ $edu->degree }}</td>
                                                @endif
                                                @if($edu->start_period)
                                                    <td>{{ $edu->start_period }}</td>
                                                @endif
                                                @if($edu->end_period)
                                                    <td>{{ $edu->end_period }}</td>
                                                @endif
                                                <td>
                                                    <div>
                                                        <a href="{{ route('curriculumvitaes.editEdu', ['user_id' => $edu->user_id, 'id' => $edu->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span>Update</span>
                                                        </a>
                                                        <form action="{{ route('curriculumvitaes.destroy', ['user_id' => $edu->user_id, 'type' => 'education', 'id' => $edu->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-edu-id="{{ $edu->id }}">
                                                                <i class="bi bi-trash-fill"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>
    <!-- End of Education Summary -->
    
    <!-- Language Summary -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Languages</h1>
        </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Language Proficiency Data</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="language" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Language</th>
                                        <th>Language Mastery Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if(isset($languages) && $languages->isNotEmpty())
                                        @foreach($languages as $language)
                                            <tr>
                                                @if($language->language)
                                                    <td>{{ $language->language }}</td>
                                                @endif
                                                @if($language->capability)
                                                    <td>{{ $language->capability }}</td>
                                                @endif
                                                <td>
                                                    <div>
                                                        <a href="{{ route('curriculumvitaes.editLanguage', ['user_id' => $language->user_id, 'id' => $language->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span>Update</span>
                                                        </a>
                                                        <form action="{{ route('curriculumvitaes.destroy', ['user_id' => $language->user_id, 'type' => 'language', 'id' => $language->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-language-id="{{ $language->id }}">
                                                                <i class="bi bi-trash-fill"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>
    <!-- End of Language Summary -->
    
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js" defer></script>
<script>
    $(document).ready(function (){
        $('#workexperience').dataTable();
    });
</script>

<script>
    $(document).ready(function (){
        $('#skill').dataTable();
    });
</script>

<script>
    $(document).ready(function (){
        $('#education').dataTable();
    });
</script>

<script>
    $(document).ready(function (){
        $('#language').dataTable();
    });
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delete-button')) {
            e.preventDefault();
            const sertifikatId = e.target.getAttribute('data-sertifikat-id');
            if (confirm('Are you sure want to delete this certificate?')) {
                document.getElementById('deleteForm_' + sertifikatId).submit();
            }
        }
    });
</script>
@endsection