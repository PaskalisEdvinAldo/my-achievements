@extends('layouts.main')

@section('title', 'MyAchievements | Languages')

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
                    <form action="{{ route('curriculumvitaes.storeLanguage') }}" method="POST" name="createlanguage" id="createlanguage" enctype="multipart/form-data">
                        @csrf
                        <!-- Language -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Curriculum Vitae Completeness</h6>
                            </div>
                                <div class="card-body">
                                    <div class="p-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Languages</h4></div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="labels">Language</label>
                                                    <input type="text" class="form-control" placeholder="enter your main language" value="{{ old('language') }}" name="language" autofocus required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Language Mastery Level</label>
                                                    <select id="capability" class="@error('capability') is-invalid @enderror form-select" form="createlanguage" name="capability" value="{{ old('capability') }}" required>
                                                        <option selected disabled>choose mastery level</option>
                                                        <option value="Beginner" {{ old('capability') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                                        <option value="Intermediate" {{ old('capability') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                                        <option value="Proficient" {{ old('capability') == 'Proficient' ? 'selected' : '' }}>Proficient</option>
                                                        <option value="Fluent" {{ old('capability') == 'Fluent' ? 'selected' : '' }}>Fluent</option>
                                                        <option value="Native" {{ old('capability') == 'Native' ? 'selected' : '' }}>Native</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Language -->

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
