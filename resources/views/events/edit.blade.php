@extends('layouts.main')

@section('title', 'MyAchievements | Edit Event Registration')

@section('container')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if($lomba)
                        <form action="{{ route('events.update', ['user_id' => $lomba->user_id,'lomba' => $lomba->id]) }}" method="POST" name="eventedit" id="eventedit" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Event Registration</h6>
                                </div>
                                    <div class="card-body">
                                        <div class="p-3">
                                            {{-- <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Work Experience</h4></div> --}}
                                                <div class="row mt-2">
                                                    <div class="col-md-4">
                                                        <label class="labels">Fullname</label>
                                                        <input type="text" class="form-control" placeholder="" value="{{ $lomba->fullname }}" name="fullname" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="labels">Grade</label>
                                                        <select id="grade" class="@error('grade') is-invalid @enderror form-select" form="eventedit" name="grade" value="{{ old('grade') }}" required>
                                                            <option selected disabled>choose grade</option>
                                                            <option value="10" {{ $lomba->grade == '10' ? 'selected' : '' }}>10</option>
                                                            <option value="11" {{ $lomba->grade == '11' ? 'selected' : '' }}>11</option>
                                                            <option value="12" {{ $lomba->grade == '12' ? 'selected' : '' }}>12</option>
                                                        </select>
                                                        @error('grade')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="labels">Area of Expertise</label>
                                                        <select id="expertise" class="@error('expertise') is-invalid @enderror form-select" form="eventedit" name="expertise" value="{{ old('expertise') }}" required>
                                                            <option selected disabled>choose area of expertise</option>
                                                            <option value="Teknik Mekatronika" {{ $lomba->expertise == 'Teknik Mekatronika' ? 'selected' : '' }}>Teknik Mekatronika</option>
                                                            <option value="Teknik Elektronika Industri" {{ $lomba->expertise == 'Teknik Elektronika Industri' ? 'selected' : '' }}>Teknik Elektronika Industri</option>
                                                            <option value="Produksi dan Siaran Program Televisi" {{ $lomba->expertise == 'Produksi dan Siaran Program Televisi' ? 'selected' : '' }}>Produksi dan Siaran Program Televisi</option>
                                                            <option value="Teknik Audio Video" {{ $lomba->expertise == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                                                            <option value="Animasi" {{ $lomba->expertise == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                                            <option value="Teknik Komputer dan Jaringan" {{ $lomba->expertise == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                                                            <option value="Rekayasa Perangkat Lunak" {{ $lomba->expertise == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                            <option value="Desain Komunikasi Visual" {{ $lomba->expertise == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                                        </select>
                                                        @error('expertise')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label class="labels">Event Selection</label>
                                                            <select class="@error('event_select') is-invalid @enderror form-select" form="eventedit" name="event_select">
                                                                <option selected disabled>choose event you want to apply</option>
                                                                <option value="Lomba Poster Digital" {{ $lomba->event_select == 'Lomba Poster Digital' ? 'selected' : '' }}>LOMBA POSTER DIGITAL</option>
                                                                <option value="Lomba Karya Ilmiah Nasional" {{ $lomba->event_select == 'Lomba Karya Ilmiah Nasional' ? 'selected' : '' }}>LOMBA KARYA ILMIAH NASIONAL</option>
                                                                <option value="Olimpiade Bahasa dan Sains" {{ $lomba->event_select == 'Olimpiade Bahasa dan Sains' ? 'selected' : '' }}>OLIMPIADE BAHASA DAN SAINS SE-INDONESIA</option>
                                                                <option value="Olimpiade Matematika" {{ $lomba->event_select == 'Olimpiade Matematika' ? 'selected' : '' }}>OLIMPIADE MATEMATIKA SE-JAWA TIMUR TERBUKA 2023</option>
                                                            </select>
                                                            @error('event_select')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="labels">Field of Activity</label>
                                                            <select class="@error('event_field') is-invalid @enderror form-select" form="eventedit" name="event_field">
                                                                <option selected disabled>choose field</option>
                                                                <option value="Academic" {{ $lomba->event_field == 'Academic' ? 'selected' : '' }}>Academic</option>
                                                                <option value="Non Academic" {{ $lomba->event_field == 'Non Academic' ? 'selected' : '' }}>Non Academic</option>
                                                            </select>
                                                            @error('event_field')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="labels">Activity Type</label>
                                                            <select class="@error('event_type') is-invalid @enderror form-select" form="eventedit" name="event_type">
                                                                <option selected disabled>choose type</option>
                                                                <option value="Online" {{ $lomba->event_type == 'Online' ? 'selected' : '' }}>Online</option>
                                                                <option value="Offline" {{ $lomba->event_type == 'Offline' ? 'selected' : '' }}>Offline</option>
                                                            </select>
                                                            @error('event_type')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label class="labels">Event Date</label>
                                                        <input type="text" class="@error('event_field') is-invalid @enderror form-control" placeholder="" value="{{ $lomba->daterange }}" name="daterange"></div>
                                                        @error('daterange')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                    @enderror
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-4">
                                                        <label class="labels">Country</label>
                                                            <select class="@error('country') is-invalid @enderror form-select country" form="eventedit" name="country" onchange='loadStates()'>
                                                                <option selected>choose country</option>
                                                            </select>
                                                            @error('country')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="labels">State</label>
                                                            <select class="@error('state') is-invalid @enderror form-select state" form="eventedit" name="state" onchange='loadCities()'>
                                                                <option selected>choose country</option>
                                                            </select>
                                                            @error('state')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="labels">City</label>
                                                            <select class="@error('city') is-invalid @enderror form-select city" form="eventedit" name="city">
                                                                <option selected>choose country</option>
                                                            </select>
                                                            @error('city')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col text-right"><a href="{{ route('events.show') }}" class="btn btn-primary bg-dark border-0 profile-button"><i class="bi bi-arrow-left"></i> Back</a>
                                    <button class="btn btn-primary profile-button border-0 bg-danger" type="reset"><i class="bi bi-x-lg"></i> Cancel</button>
                                            <button class="btn btn-primary profile-button border-0 bg-success" type="submit"><i class="bi bi-floppy-fill"></i> Save</button></div>
                                </div>
                        </form>
                    @else
                        <p>Event Not Found!</p>
                    @endif
                </div>
             </div>
        </div>
        <script src="{{ asset('js/location.js') }}"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>

        <script>
            $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
            });
        </script>
@endsection
