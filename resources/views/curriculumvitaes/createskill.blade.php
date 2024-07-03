@extends('layouts.main')

@section('title', 'MyAchievements | Skills & Tools')

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
                    <form action="{{ route('curriculumvitaes.storeSkill') }}" method="POST" name="createskill" id="createskill" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control @error('expertise_field') is-invalid @enderror" placeholder="enter your field of expertise" value="{{ old('expertise_field') }}" name="expertise_field" autofocus required>
                                                    @error('expertise_field')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Utilized Tools</label>
                                                    <input type="text" class="form-control @error('tools') is-invalid @enderror" placeholder="enter your utilized tools" value="{{ old('tools') }}" name="tools" required>
                                                    @error('tools')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12"><label class="labels mb-0">Other</label>
                                                    <div class="mb-3"><span class="text-sm text-black-50">(Note: give (-) if it's empty)</span></div>
                                                    <input type="text" class="form-control @error('other_skills') is-invalid @enderror" placeholder="enter your other skills/tools" value="{{ old('other_skills') }}" name="other_skills">
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
