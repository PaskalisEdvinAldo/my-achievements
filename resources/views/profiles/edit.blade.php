@extends('layouts.main')

@section('title', 'MyAchievements | Edit Profile')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                @if(isset($users))
                    <span class="font-weight-bold">{{ $users->fullname }}</span>
                @else
                    <span class="font-weight-bold">Hello there!</span>
                @endif
                
                @if(isset($users))
                    <span class="text-black-50">{{ $users->email }}</span>
                @else
                    <span class="text-black-50">email@gmail.com</span>
                @endif
            </div>
        </div>
        <div class="col-md-4 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Profile</h4>
                </div>
                <form id="edit" name="edit" action="{{ route('profiles.update', ['profile' => $profile->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Full Name</label>
                                    <input type="text" id="fullname" class="form-control" placeholder="full name" value="{{ $profile->user->fullname }}" name="fullname" disabled>
                                </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Nickname</label>
                                <input type="text" id="nickname" class="form-control" value="{{ $profile->user->nickname }}" placeholder="Nickname" name="nickname" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Place of Birth</label>
                                <input type="text" class="@error('birth_place') is-invalid @enderror form-control" placeholder="Enter your place of birth" value="{{ $profile->birth_place }}" name="birth_place" required autofocus>
                                @error('birth_place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Phone Number</label>
                                <div id="phone-input-container">
                                    <input id="phone" type="tel" class="form-control" placeholder="" value="{{ $profile->phone }}" name="phone" required>
                                    <button id="btn" type="button" class="btn btn-primary">Validate</button>
                                    <span id="valid-msg" class="hide"></span>
                                    <span id="error-msg" class="hide"></span>
                                </div>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-6"><label class="labels">Date of Birth</label>
                                <input type="date" id="birth_date" class="@error('birth_date') is-invalid @enderror form-control" placeholder="" value="{{ $profile->birth_date }}" name="birth_date" required>
                                @error('birth_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Home Address</label>
                                <input type="text" id="home_address" class="@error('home_address') is-invalid @enderror form-control" placeholder="enter your home address" value="{{ $profile->home_address }}" name="home_address" required>
                                @error('home_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Current Address</label>
                                <input type="text" id="current_address" class="@error('current_address') is-invalid @enderror form-control" placeholder="enter your current address" value="{{ $profile->current_address }}" name="current_address" required>
                                @error('current_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Postal Code</label>
                                <input type="int" id="postal_code" class="@error('postal_code') is-invalid @enderror form-control" placeholder="enter your postal code" value="{{ $profile->postal_code }}" name="postal_code" required>
                                @error('postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                                <div class="col-md-12"><label class="labels">Email</label>
                                    <input type="text" id="email" class="form-control" placeholder="email@gmail.com" value="{{ $profile->user->email }}" name="email" disabled>
                                </div>
                            
                            <div class="col-md-12">
                                <label class="labels">Grade</label>
                                    <select id="grade" class="@error('grade') is-invalid @enderror form-select" form="edit" name="grade" value="{{ $profile->grade }}" required>
                                        <option selected disabled>choose grade</option>
                                        <option value="10" {{ $profile->grade == '10' ? 'selected' : '' }}>10</option>
                                        <option value="11" {{ $profile->grade == '11' ? 'selected' : '' }}>11</option>
                                        <option value="12" {{ $profile->grade == '12' ? 'selected' : '' }}>12</option>
                                    </select>
                                    @error('grade')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Area of Expertise</label>
                                    <select id="expertise" class="@error('expertise') is-invalid @enderror form-select" form="edit" name="expertise" value="{{ $profile->expertise }}" required>
                                        <option selected disabled>choose area of expertise</option>
                                        <option value="Teknik Mekatronika" {{ $profile->expertise == 'Teknik Mekatronika' ? 'selected' : '' }}>Teknik Mekatronika</option>
                                        <option value="Teknik Elektronika Industri" {{ $profile->expertise == 'Teknik Elektronika Industri' ? 'selected' : '' }}>Teknik Elektronika Industri</option>
                                        <option value="Produksi dan Siaran Program Televisi" {{ $profile->expertise == 'Produksi dan Siaran Program Televisi' ? 'selected' : '' }}>Produksi dan Siaran Program Televisi</option>
                                        <option value="Teknik Audio Video" {{ $profile->expertise == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                                        <option value="Animasi" {{ $profile->expertise == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                        <option value="Teknik Komputer dan Jaringan" {{ $profile->expertise == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                                        <option value="Rekayasa Perangkat Lunak" {{ $profile->expertise == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                        <option value="Desain Komunikasi Visual" {{ $profile->expertise == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                    </select>
                                    @error('expertise')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Year of Admission</label>
                                <input type="date" id="admission" class="@error('admission') is-invalid @enderror form-control" placeholder="enter your year of admission" value="{{ $profile->admission }}" name="admission" required>
                                @error('admission')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Talents</label>
                                <input type="text" id="talent" class="@error('talent') is-invalid @enderror form-control" placeholder="enter your talents" value="{{ $profile->talent }}" name="talent" required>
                                @error('talent')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6"><label class="labels">Interests</label>
                                <input type="text" id="interest" class="@error('interest') is-invalid @enderror form-control" value="{{ $profile->interest }}" placeholder="enter your interests" name="interest" required>
                                @error('interest')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6 text-center"><a href="{{ route('profiles.index') }}" class="btn btn-primary bg-dark border-0 profile-button"><i class="bi bi-arrow-left"></i> Back</a></div>
                            <div class="col-md-6 text-center"><button class="btn btn-primary bg-success border-0 profile-button" type="submit"><i class="bi bi-floppy-fill"></i> Update</button></div>
                        </div>
            </div>
        </div>
                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center experience"><span>Social Media</span></div><br>
                                <div class="col-md-12"><label class="labels">LinkedIn</label>
                                    <input type="text" id="linkedin" class="@error('linkedin') is-invalid @enderror form-control" placeholder="enter your linkedin account" value="{{ $profile->linkedin }}" name="linkedin" required>
                                    @error('linkedin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12"><label class="labels">Facebook</label>
                                    <input type="text" id="facebook" class="@error('facebook') is-invalid @enderror form-control" placeholder="enter your facebook account" value="{{ $profile->facebook }}" name="facebook" required>
                                    @error('facebook')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12"><label class="labels">Instagram</label>
                                    <input type="text" id="instagram" class="@error('instagram') is-invalid @enderror form-control" placeholder="enter your instagram account" value="{{ $profile->instagram }}" name="instagram" required>
                                    @error('instagram')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> <br>
                            </div>
                            <div class="p-3 py-3">
                                <div class="d-flex justify-content-between align-items-center experience"><span>Personal Branding</span></div><br>
                                <div class="col-md-12"><label class="labels">About Me</label>
                                    <textarea id="branding" class="@error('branding') is-invalid @enderror form-control" placeholder="describe yourself" name="branding" cols="30" rows="5" required>{{ $profile->branding }}</textarea>
                                    @error('branding')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div> <br>
                            </div>
                        </div>
                    </form>
    </div>
</div>

                        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@20.0.5/build/js/intlTelInput.min.js"></script>
                        <script>
                            const input = document.querySelector("#phone");
                            const button = document.querySelector("#btn");
                            const errorMsg = document.querySelector("#error-msg");
                            const validMsg = document.querySelector("#valid-msg");
                        
                            const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
                            
                            const script = document.createElement('script');
                            script.src = "https://cdn.jsdelivr.net/npm/intl-tel-input@20.0.5/build/js/utils.js";
                            script.onload = function() {
                                const iti = window.intlTelInput(input, {
                                    initialCountry: "{{ $profile->country_code }}",
                                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@20.0.5/build/js/utils.js",
                                });
                        
                                input.style.width = '100%';
                                input.style.resize = 'none';
                                input.style.overflow = 'hidden';
                                input.parentNode.style.width = '100%';
                                input.style.height = '40px';
                                input.style.fontSize = '16px';
                        
                                const reset = () => {
                                    input.classList.remove("error");
                                    errorMsg.innerHTML = "";
                                    errorMsg.classList.add("hide");
                                    validMsg.innerHTML = "";
                                    validMsg.classList.add("hide");
                                };
                        
                                const showError = (msg) => {
                                    input.classList.add("error");
                                    errorMsg.innerHTML = msg;
                                    errorMsg.classList.remove("hide");
                                };
                        
                                button.addEventListener('click', () => {
                                    reset();
                                    const selectedCountry = iti.getSelectedCountryData();
                                    const inputNumber = input.value.trim();
                                    const countryCode = selectedCountry.dialCode;
                        
                                    if (inputNumber.startsWith(`+${countryCode}`)) {
                                        if (iti.isValidNumber()) {
                                            validMsg.innerHTML = "Valid";
                                            validMsg.classList.remove("hide");
                                        } else {
                                            const errorCode = iti.getValidationError();
                                            const msg = errorMap[errorCode] || "Invalid number";
                                            showError(msg);
                                        }
                                    } else {
                                        if (inputNumber.startsWith('+')) {
                                            showError("Invalid country code");
                                        } else {
                                            showError("Number does not match selected country");
                                        }
                                    }
                                });
                        
                                const resetInput = () => {
                                    reset();
                                };
                                input.addEventListener('change', resetInput);
                                input.addEventListener('keyup', resetInput);
                            };
                        
                            document.head.appendChild(script);
                        </script>
@endsection