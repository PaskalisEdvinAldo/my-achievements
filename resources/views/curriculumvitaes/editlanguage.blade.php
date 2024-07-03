@extends('layouts.main')

@section('title', 'MyAchievements | Edit Languages')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('curriculumvitaes.updateLanguage', ['user_id' => $language->user_id, 'language' => $language->id]) }}" method="POST" name="editlanguage" id="editlanguage" enctype="multipart/form-data">
                        @method('PUT')
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
                                                    <input type="text" class="form-control" placeholder="enter your main language" value="{{ $language->language }}" name="language" autofocus required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Language Mastery Level</label>
                                                    <select id="capability" class="@error('capability') is-invalid @enderror form-select" form="editlanguage" name="capability" value="{{ old('capability') }}" required>
                                                        <option selected disabled>choose mastery level</option>
                                                        <option value="Beginner" {{ $language->capability == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                                        <option value="Intermediate" {{ $language->capability == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                                        <option value="Proficient" {{ $language->capability == 'Proficient' ? 'selected' : '' }}>Proficient</option>
                                                        <option value="Fluent" {{ $language->capability == 'Fluent' ? 'selected' : '' }}>Fluent</option>
                                                        <option value="Native" {{ $language->capability == 'Native' ? 'selected' : '' }}>Native</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Language -->

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
