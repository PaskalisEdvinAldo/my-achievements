@extends('layouts.main')

@section('title', 'MyAchievements | Edit Work Experience')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('curriculumvitaes.updateWork', ['user_id' => $work->user_id, 'work' => $work->id]) }}" method="POST" name="editwork" id="editwork" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!-- Work Experiences -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Curriculum Vitae Completeness</h6>
                            </div>
                                <div class="card-body">
                                    <div class="p-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Work Experience</h4></div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Company</label>
                                                    <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="company name" value="{{ $work->company }}" name="company" autofocus required>
                                                    @error('company')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label class="labels">Position/Role</label>
                                                    <input type="text" class="form-control @error('position') is-invalid @enderror" placeholder="enter your position" value="{{ $work->position }}" name="position" required>
                                                    @error('position')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3"><label class="labels">Start Tenure</label>
                                                    <input type="date" class="form-control @error('start_tenure') is-invalid @enderror" placeholder="enter your start tenure" value="{{ $work->start_tenure }}" name="start_tenure" required>
                                                    @error('start_tenure')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3"><label class="labels">End Tenure</label>
                                                    <input type="date" class="form-control @error('end_tenure') is-invalid @enderror" placeholder="enter your end tenure" value="{{ $work->end_tenure }}" name="end_tenure" required>
                                                    @error('end_tenure')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label class="labels">Job Description</label>
                                                        <input id="job_desc" class="@error('job_desc') is-invalid @enderror" type="hidden" placeholder="" value="{{ $work->job_desc }}" name="job_desc" required>
                                                        <trix-editor input="job_desc"></trix-editor>
                                                        @error('job_desc')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label class="labels mb-0">Achievements</label>
                                                        <div class="mb-3"><span class="text-sm text-black-50">(Note: give (-) if it's empty)</span></div>
                                                        <input id="achievement_desc" class="@error('achievement_desc') is-invalid @enderror" type="hidden" value="{{ $work->achievement_desc }}" name="achievement_desc">
                                                        <trix-editor input="achievement_desc"></trix-editor>
                                                        @error('achievement_desc')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">Technologies used</label>
                                                    <input type="text" class="form-control @error('tech') is-invalid @enderror" placeholder="enter your work platform" value="{{ $work->tech }}" name="tech" required>
                                                    @error('tech')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Work Experiences -->

                            <div class="row mt-3">
                                <div class="col text-right">
                                    <a href="{{ route('curriculumvitaes.show') }}" class="btn btn-primary bg-dark border-0 profile-button"><i class="bi bi-arrow-left"></i> Back</a>
                                    <button class="btn btn-primary profile-button border-0 bg-danger" type="reset"><i class="bi bi-x-lg"></i> Cancel</button>
                                    <button class="btn btn-primary profile-button border-0 bg-success" type="submit"><i class="bi bi-floppy-fill"></i> Save</button></div>
                            </div>
                    </form>
                </div>
             </div>
        </div>
        
        <script>
            document.addEventListener('trix-file-accept', function(e){
                e.preventDefault();
            })
        </script>

@endsection
