@extends('layouts.main')

@section('title', 'MyAchievements | Edit Educations')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('curriculumvitaes.updateEdu', ['user_id' => $edu->user_id, 'edu' => $edu->id]) }}" method="POST" name="editedu" id="editedu" enctype="multipart/form-data">
                        @method('PUT')
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
                                                    <input type="text" class="form-control @error('institution') is-invalid @enderror" placeholder="enter your institution name" value="{{ $edu->institution }}" name="institution" autofocus required>
                                                    @error('institution')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label class="labels">Degree</label>
                                                    <select id="degree" class="@error('degree') is-invalid @enderror form-select" form="editedu" name="degree" value="{{ old('degree') }}" required>
                                                        <option selected disabled>choose degree</option>
                                                        <option value="Teknik Mekatronika" {{ $edu->degree == 'Teknik Mekatronika' ? 'selected' : '' }}>Teknik Mekatronika</option>
                                                        <option value="Teknik Elektronika Industri" {{ $edu->degree == 'Teknik Elektronika Industri' ? 'selected' : '' }}>Teknik Elektronika Industri</option>
                                                        <option value="Produksi dan Siaran Program Televisi" {{ $edu->degree == 'Produksi dan Siaran Program Televisi' ? 'selected' : '' }}>Produksi dan Siaran Program Televisi</option>
                                                        <option value="Teknik Audio Video" {{ $edu->degree == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                                                        <option value="Animasi" {{ $edu->degree == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                                        <option value="Teknik Komputer dan Jaringan" {{ $edu->degree == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                                                        <option value="Rekayasa Perangkat Lunak" {{ $edu->degree == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                        <option value="Desain Komunikasi Visual" {{ $edu->degree == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                                    </select>
                                                    @error('degree')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3"><label class="labels">Start Period</label>
                                                    <input type="date" class="form-control @error('start_period') is-invalid @enderror" placeholder="enter your start year admission" value="{{ $edu->start_period }}" name="start_period" required>
                                                    @error('start_period')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3"><label class="labels">End Period</label>
                                                    <input type="date" class="form-control @error('end_period') is-invalid @enderror" placeholder="enter your final year admission" value="{{ $edu->end_period }}" name="end_period" required>
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
