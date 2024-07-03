@extends('layouts.main')

@section('title', 'MyAchievements | Certificates')

@section('container')

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
                    <form action="/certificates" method="POST" name="certificate" id="certificate" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Certificate Form</h6>
                            </div>
                                <div class="card-body">

                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Activity Form</h4></div>
                                             <div class="row mt-2">
                                                <div class="col-md-4">
                                                    <label class="labels">Classification</label>
                                                        <select id="classification" class="@error('classification') is-invalid @enderror form-select" form="certificate" name="classification" value="{{ old('classification') }}" required>
                                                            <option selected disabled>choose classification</option>
                                                            <option value="Competence Certificate" {{ old('classification') == 'Competence Certificate' ? 'selected' : '' }}>Competence Certificate</option>
                                                            <option value="Accomplishments and Honors" {{ old('classification') == 'Accomplishments and Honors' ? 'selected' : '' }}>Accomplishments and Honors</option>
                                                            <option value="Self Development Program" {{ old('classification') == 'Self Development Program' ? 'selected' : '' }}>Self Development Program</option>
                                                        </select>
                                                        @error('classification')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="labels">Level</label>
                                                        <select id="level" class="@error('level') is-invalid @enderror form-select" form="certificate" name="level" :value="{{ old('level') }}" required>
                                                            <option selected disabled>choose level</option>
                                                            <option value="International" {{ old('level') == 'International' ? 'selected' : '' }}>International</option>
                                                            <option value="National" {{ old('level') == 'National' ? 'selected' : '' }}>National</option>
                                                            <option value="Regional (more than 3 provinces)" {{ old('level') == 'Regional (more than 3 provinces)' ? 'selected' : '' }}>Regional (more than 3 provinces)</option>
                                                            <option value="Province" {{ old('level') == 'Province' ? 'selected' : '' }}>Province</option>
                                                            <option value="Inter-District" {{ old('level') == 'Inter-District' ? 'selected' : '' }}>Inter-District</option>
                                                            <option value="Inter-School" {{ old('level') == 'Inter-School' ? 'selected' : '' }}>Inter-School</option>
                                                        </select>
                                                        @error('level')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="labels">Role/Position</label>
                                                        <select id="role" class="@error('role') is-invalid @enderror form-select" form="certificate" name="role" value="{{ old('role') }}" required>
                                                            <option selected>choose classification</option>
                                                        </select>
                                                        @error('role')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="labels">Description</label>
                                                        <select id="description" class="@error('description') is-invalid @enderror form-select" form="certificate" name="description" value="{{ old('description') }}" required>
                                                            <option selected>choose role/position</option>
                                                        </select>
                                                        @error('description')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Achievement</label>
                                                        <select id="achievement" class="@error('achievement') is-invalid @enderror form-select" form="certificate" name="achievement" value="{{ old('achievement') }}" required>
                                                            <option selected>choose classification</option>
                                                        </select>
                                                        @error('achievement')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-12 mt-3"><label class="labels">Event</label>
                                                    <input type="text" class="@error ('event_name') is-invalid @enderror form-control" placeholder="enter event name" value="{{ old('event_name') }}" name="event_name" required>
                                                    @error('event_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="labels">Field of Activity</label>
                                                        <select class="@error('event_field') is-invalid @enderror form-select" form="certificate" name="event_field" value="{{ old('event_field') }}" required>
                                                            <option selected disabled>choose field</option>
                                                            <option value="Academic" {{ old('event_field') == 'Academic' ? 'selected' : '' }}>Academic</option>
                                                            <option value="Non Academic" {{ old('event_field') == 'Non Academic' ? 'selected' : '' }}>Non Academic</option>
                                                        </select>
                                                        @error('event_field')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="labels">Activity Type</label>
                                                        <select class="@error('event_type') is-invalid @enderror form-select" form="certificate" name="event_type" value="{{ old('event_type') }}" required>
                                                            <option selected disabled>choose type</option>
                                                            <option value="Online" {{ old('event_type') == 'Online' ? 'selected' : '' }}>Online</option>
                                                            <option value="Offline" {{ old('event_type') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                                        </select>
                                                        @error('event_type')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><label class="labels">Event Date</label>
                                                    <input type="text" class="@error ('event_date') is-invalid @enderror form-control" placeholder="enter event URL" value="{{ old('event_date') }}" name="event_date">
                                                    @error('event_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6"><label class="labels">Certificate Date</label>
                                                    <input type="date" class="@error('certificate_date') is-invalid @enderror form-control" placeholder="" value="{{ old('certificate_date') }}" name="certificate_date" required>
                                                    @error('certificate_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mt-3"><label class="labels">URL (Optional)</label>
                                                    <input type="text" class="@error ('event_link') is-invalid @enderror form-control" placeholder="enter event URL" value="{{ old('event_link') }}" name="event_link">
                                                    @error('event_link')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label class="labels">Country</label>
                                                        <select class="@error('country') is-invalid @enderror form-select country" form="certificate" value="{{ old('country') }}" name="country" onchange='loadStates()' required>
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
                                                        <select class="@error('state') is-invalid @enderror form-select state" form="certificate" value="{{ old('state') }}" name="state" onchange='loadCities()'>
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
                                                        <select class="@error('city') is-invalid @enderror form-select city" form="certificate" value="{{ old('city') }}" name="city">
                                                            <option selected>choose country</option>
                                                        </select>
                                                        @error('city')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="col-md-12 mt-3"><label class="labels mb-0">Certificate File Upload</label>
                                                    <div class="mb-3"><span class="text-sm text-black-50">(accepted files: All Image Files, e.g: .png, .jpg, .jpeg)</span></div>
                                                    <input type="file" class="@error ('award') is-invalid @enderror form-control" id="award" placeholder="" name="award" required>
                                                    @error('award')
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
                                <div class="col text-right">
                                    <button class="btn btn-primary profile-button border-0 bg-danger" type="reset"><i class="bi bi-x-lg"></i> Cancel</button>
                                    <button class="btn btn-primary profile-button border-0 bg-success" type="submit"><i class="bi bi-floppy-fill"></i> Save</button>
                                </div>
                            </div>
                    </form>
                </div>
             </div>
        </div>

        <script src="{{ asset('js/location.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
        
        <script>
            //VanillaJS
            function addOption(text, value, selected, disabled){
                var option = document.createElement("option");
                option.text = text;
                option.value = value;
                option.selected = selected;
                option.disabled = disabled;
                return option;
            }
        
            document.addEventListener("DOMContentLoaded", function () {
                var classificationSelect = document.getElementById("classification");
                var roleSelect = document.getElementById("role");
                var achievementSelect = document.getElementById("achievement");
                var descriptionSelect = document.getElementById("description");
        
                classificationSelect.addEventListener("change", function () {
                    let classification = classificationSelect.value;
                    roleSelect.innerHTML = "";
                    if (classification === 'Competence Certificate') {
                        roleSelect.append(addOption("choose role/position", "", true, true));
                        roleSelect.add(new Option("Advanced/Excellent", "Advanced/Excellent"));
                        roleSelect.add(new Option("Medium/Average", "Medium/Average"));
                        roleSelect.add(new Option("Basic", "Basic"));
                    } else if (classification === 'Accomplishments and Honors') {
                        roleSelect.append(addOption("choose role/position", "", true, true));
                        roleSelect.add(new Option("Non-Competition Activities", "Non-Competition Activities"));
                        roleSelect.add(new Option("Competition Activities", "Competition Activities"));
                        roleSelect.add(new Option("Student Council Activities", "Student Council Activities"));
                    } else {
                        roleSelect.append(addOption("choose role/position", "", true, true));
                        roleSelect.add(new Option("Chairman", "Chairman"));
                        roleSelect.add(new Option("Vice Chairman", "Vice Chairman"));
                        roleSelect.add(new Option("Secretary", "Secretary"));
                        roleSelect.add(new Option("Treasurer", "Treasurer"));
                        roleSelect.add(new Option("Selected Participant", "Selected Participant"));
                        roleSelect.add(new Option("Regular Participant", "Regular Participant"));
                        roleSelect.add(new Option("Independent", "Independent"));
                        roleSelect.add(new Option("Partnership", "Partnership"));
                        roleSelect.add(new Option("PT (Perseroan Terbatas)", "PT (Perseroan Terbatas)"));
                        roleSelect.add(new Option("CV (Comanditare Venonshcaap)", "CV (Comanditare Venonshcaap)"));
                        roleSelect.add(new Option("UD (Usaha Dagang)", "UD (Usaha Dagang)"));
                        roleSelect.add(new Option("FIRMA", "FIRMA"));
                    }
                });

                roleSelect.addEventListener("change", function () {
                    let role = roleSelect.value;
                    achievementSelect.innerHTML = "";
                    if (role === 'Competition Activities') {
                        achievementSelect.append(addOption("choose achievement", "", true, true));
                        achievementSelect.add(new Option("First Place", "First Place"));
                        achievementSelect.add(new Option("Runner Up", "Runner Up"));
                        achievementSelect.add(new Option("Third Place", "Third Place"));
                    } else {
                        achievementSelect.append(addOption("choose achievement", "", true, true));
                        achievementSelect.add(new Option("-", "-"));
                    }
                });

                roleSelect.addEventListener("change", function () {
                    let role = roleSelect.value;
                    descriptionSelect.innerHTML = "";
                    if (role === 'Non-Competition Activities') {
                        descriptionSelect.append(addOption("choose activity description", "", true, true));
                        descriptionSelect.add(new Option("Internship", "Internship"));
                        descriptionSelect.add(new Option("School Representative", "School Representative"));
                        descriptionSelect.add(new Option("Department Representative", "Department Representative"));
                    } else {
                        descriptionSelect.append(addOption("choose activity description", "", true, true));
                        descriptionSelect.add(new Option("-", "-"));
                    }
                });
            });
        </script>


        <script>
            $(function() {
            $('input[name="event_date"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        </script>
@endsection