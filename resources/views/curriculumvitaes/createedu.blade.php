@extends('layouts.main')

@section('title', 'MyAchievements | Educations')

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
                    <form action="{{ route('curriculumvitaes.storeEdu') }}" method="POST" name="createedu" id="createedu" enctype="multipart/form-data">
                        @csrf
                        <!-- Education -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Curriculum Vitae Completeness</h6>
                            </div>
                                <div class="card-body">
                                    <div class="p-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Education</h4></div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Institution</label>
                                                    <input type="text" class="form-control @error('institution') is-invalid @enderror" placeholder="enter your institution name" value="{{ old('institution') }}" name="institution" autofocus required>
                                                    @error('institution')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label class="labels">Degree</label>
                                                    <select id="degree" class="@error('degree') is-invalid @enderror form-select" form="createedu" name="degree" value="" required>
                                                        <option selected disabled>choose degree</option>
                                                        <option value="Teknik Mekatronika" {{ old('degree') == 'Teknik Mekatronika' ? 'selected' : '' }}>Teknik Mekatronika</option>
                                                        <option value="Teknik Elektronika Industri" {{ old('degree') == 'Teknik Elektronika Industri' ? 'selected' : '' }}>Teknik Elektronika Industri</option>
                                                        <option value="Produksi dan Siaran Program Televisi" {{ old('degree') == 'Produksi dan Siaran Program Televisi' ? 'selected' : '' }}>Produksi dan Siaran Program Televisi</option>
                                                        <option value="Teknik Audio Video" {{ old('degree') == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                                                        <option value="Animasi" {{ old('degree') == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                                        <option value="Teknik Komputer dan Jaringan" {{ old('degree') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                                                        <option value="Rekayasa Perangkat Lunak" {{ old('degree') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                        <option value="Desain Komunikasi Visual" {{ old('degree') == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                                    </select>
                                                    @error('degree')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3"><label class="labels">Start Period</label>
                                                    <input type="date" class="form-control @error('start_period') is-invalid @enderror" placeholder="enter your start year admission" value="{{ old('start_period') }}" name="start_period" required>
                                                    @error('start_period')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3"><label class="labels">End Period</label>
                                                    <input type="date" class="form-control @error('end_period') is-invalid @enderror" placeholder="enter your final year admission" value="{{ old('end_period') }}" name="end_period" required>
                                                    @error('end_period')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Education -->

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
