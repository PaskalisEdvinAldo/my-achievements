@extends('layouts.main')

@section('title', 'MyAchievements | Edit Skills & Tools')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('curriculumvitaes.updateSkill', ['user_id' => $skill->user_id, 'skill' => $skill->id]) }}" method="POST" name="editskill" id="editskill" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!-- Skills / Tools -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Curriculum Vitae Completeness</h6>
                            </div>
                                <div class="card-body">
                                    <div class="p-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Skills & Tools</h4></div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Field of Expertise</label>
                                                    <input type="text" class="form-control @error('expertise_field') is-invalid @enderror" placeholder="enter your field of expertise" value="{{ $skill->expertise_field }}" name="expertise_field" autofocus required>
                                                    @error('expertise_field')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Utilized Tools</label>
                                                    <input type="text" class="form-control @error('tools') is-invalid @enderror" placeholder="enter your utilized tools" value="{{ $skill->tools }}" name="tools" required>
                                                    @error('tools')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12"><label class="labels mb-0">Other</label>
                                                    <div class="mb-3"><span class="text-sm text-black-50">(Note: give (-) if it's empty)</span></div>
                                                    <input type="text" class="form-control @error('other_skills') is-invalid @enderror" placeholder="enter your other skills/tools" value="{{ $skill->other_skills }}" name="other_skills">
                                                    @error('other_skills')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Skills / Tools -->

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
