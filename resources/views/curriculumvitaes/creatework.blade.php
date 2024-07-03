@extends('layouts.main')

@section('title', 'MyAchievements | Work Experience')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>
    @if(session()->has('error'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('curriculumvitaes.storeWork') }}" method="POST" name="creatework" id="creatework" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="company name" value="{{ old('company') }}" name="company" autofocus required>
                                                    @error('company')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label class="labels">Position/Role</label>
                                                    <input type="text" class="form-control @error('position') is-invalid @enderror" placeholder="enter your position" value="{{ old('position') }}" name="position" required>
                                                    @error('position')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3"><label class="labels">Start Tenure</label>
                                                    <input type="date" class="form-control @error('start_tenure') is-invalid @enderror" placeholder="enter your start tenure" value="{{ old('start_tenure') }}" name="start_tenure" required>
                                                    @error('start_tenure')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mt-3"><label class="labels">End Tenure</label>
                                                    <input type="date" class="form-control @error('end_tenure') is-invalid @enderror" placeholder="enter your end tenure" value="{{ old('end_tenure') }}" name="end_tenure" required>
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
                                                        <input id="job_desc" class="@error('job_desc') is-invalid @enderror" type="hidden" placeholder="" value="{{ old('job_desc') }}" name="job_desc" required>
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
                                                        <input id="achievement_desc" class="@error('achievement_desc') is-invalid @enderror" type="hidden" value="{{ old('achievement_desc') }}" name="achievement_desc">
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
                                                    <input type="text" class="form-control @error('tech') is-invalid @enderror" placeholder="enter your work platform" value="{{ old('tech') }}" name="tech" required>
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
