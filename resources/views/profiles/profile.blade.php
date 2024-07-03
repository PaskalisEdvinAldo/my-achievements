@extends('layouts.main')

@section('title', 'MyAchievements | Profile')

@section('container')

        @if(session()->has('success'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <div class="alert alert-success alert-dismissible d-flex align-items-center mt-3" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
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
                        @if (!auth()->user()->profile_completed)
                            <a href="{{ route('profiles.create') }}" class="btn btn-info m-1 btn-sm align-item-center"><i class="bi bi-person-fill">
                                <span>
                                Create Profile
                                </span></i>
                            </a>
                        @elseif(isset($profiles))
                           
                            <a href="{{ route('profiles.edit', $profiles->user_id) }}" class="btn btn-warning m-1 btn-sm align-item-center"><i class="bi bi-pencil-square">
                                <span>
                                Edit Profile
                                </span></i>
                            </a>
                            
                        @endif
                    </div>
                </div>
                <div class="col-md-4 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">My Profile</h4>
                        </div>
                                <div class="row mt-2">
                                    @if(isset($users))
                                        
                                            <div class="col-md-12"><label class="labels">Full Name</label>
                                                    <input type="text" class="form-control" placeholder="full name" value="{{ $users->fullname }}" name="fullname" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Full Name</label>
                                                <input type="text" class="form-control" placeholder="enter your full name" value="" name="fullname" disabled>
                                            </div>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    @if(isset($users))
                                        
                                            <div class="col-md-6"><label class="labels">Nickname</label>
                                                <input type="text" class="form-control" value="{{ $users->nickname }}" placeholder="nickname" name="nickname" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Nickname</label>
                                                <input type="text" class="form-control" placeholder="enter your nickname" value="" name="nickname" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-6"><label class="labels">Place of Birth</label>
                                                <input type="text" class="form-control" placeholder="enter your place of birth" value="{{ $profiles->birth_place }}" name="birth_place" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Place of Birth</label>
                                                <input type="text" class="form-control" placeholder="enter your place of birth" value="" name="birth_place" disabled>
                                            </div>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-6"><label class="labels">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="enter your place of birth" value="{{ $profiles->phone }}" name="phone" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="enter your phone number" value="" name="phone" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-6"><label class="labels">Date of Birth</label>
                                                <input type="text" class="form-control" placeholder="enter your date of birth" value="{{ $profiles->birth_date }}" name="birth_date" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Date of Birth</label>
                                                <input type="text" class="form-control" placeholder="enter your date of birth" value="" name="birth_date" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Home Address</label>
                                                <input type="text" class="form-control" placeholder="enter your home address" value="{{ $profiles->home_address }}" name="home_address" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Home Address</label>
                                                <input type="text" class="form-control" placeholder="enter your home address" value="" name="home_address" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Current Address</label>
                                                <input type="text" class="form-control" placeholder="enter your current address" value="{{ $profiles->current_address }}" name="current_address" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Current Address</label>
                                                <input type="text" class="form-control" placeholder="enter your current address" value="" name="current_address" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Postal Code</label>
                                                <input type="text" class="form-control" placeholder="enter your postal code" value="{{ $profiles->postal_code }}" name="postal_code" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Postal Code</label>
                                                <input type="text" class="form-control" placeholder="enter your postal code" value="" name="postal_code" disabled>
                                            </div>
                                    @endif
                                    @if(isset($users))
                                        
                                            <div class="col-md-12"><label class="labels">Email</label>
                                                <input type="text" class="form-control" placeholder="email@gmail.com" value="{{ $users->email }}" name="email" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Email</label>
                                                <input type="text" class="form-control" placeholder="email@gmail.com" value="" name="email" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Grade</label>
                                                <input type="text" class="form-control" placeholder="choose your grade" value="{{ $profiles->grade }}" name="grade" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Grade</label>
                                                <input type="text" class="form-control" placeholder="choose your grade" value="" name="grade" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Area of Expertise</label>
                                                <input type="text" class="form-control" placeholder="enter your area of expertise" value="{{ $profiles->expertise }}" name="expertise" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Area of Expertise</label>
                                                <input type="text" class="form-control" placeholder="enter your area of expertise" value="" name="expertise" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-12"><label class="labels">Year of Admission</label>
                                                <input type="text" class="form-control" placeholder="enter your year of admission" value="{{ $profiles->admission }}" name="admission" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-12"><label class="labels">Year of Admission</label>
                                                <input type="text" class="form-control" placeholder="enter your year of admission" value="" name="admission" disabled>
                                            </div>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-6"><label class="labels">Talents</label>
                                                <input type="text" class="form-control" placeholder="enter your talents" value="{{ $profiles->talent }}" name="talent" disabled>
                                            </div>
                                        
                                    @else
                                            <div class="col-md-6"><label class="labels">Talents</label>
                                                <input type="text" class="form-control" placeholder="enter your talents" value="" name="talent" disabled>
                                            </div>
                                    @endif
                                    @if(isset($profiles))
                                        
                                            <div class="col-md-6"><label class="labels">Interests</label>
                                                <input type="text" class="form-control" placeholder="enter your interests" value="{{ $profiles->interest }}" name="interest" disabled>
                                            </div>
                                        
                                    @else
                                        <div class="col-md-6"><label class="labels">Interests</label>
                                            <input type="text" class="form-control" placeholder="enter your interests" value="" name="interest" disabled>
                                        </div>
                                    @endif
                                </div>
                    </div>
                </div>
                                <div class="col-md-4">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center experience"><span>Social Media</span></div><br>
                                        @if(isset($profiles))
                                            
                                                <div class="col-md-12"><label class="labels">Linkedin</label>
                                                    <input type="text" class="form-control" placeholder="enter your linkedin account" value="{{ $profiles->linkedin }}" name="linkedin" disabled>
                                                </div>
                                            
                                        @else
                                                <div class="col-md-12"><label class="labels">Linkedin</label>
                                                    <input type="text" class="form-control" placeholder="enter your linkedin account" value="" name="linkedin" disabled>
                                                </div>
                                        @endif
                                        @if(isset($profiles))
                                            
                                                <div class="col-md-12"><label class="labels">Facebook</label>
                                                    <input type="text" class="form-control" placeholder="enter your facebook account" value="{{ $profiles->facebook }}" name="facebook" disabled>
                                                </div>
                                            
                                        @else
                                                <div class="col-md-12"><label class="labels">Facebook</label>
                                                    <input type="text" class="form-control" placeholder="enter your facebook account" value="" name="facebook" disabled>
                                                </div>
                                        @endif
                                        @if(isset($profiles))
                                            
                                                <div class="col-md-12"><label class="labels">Instagram</label>
                                                    <input type="text" class="form-control" placeholder="enter your instagram account" value="{{ $profiles->instagram }}" name="instagram" disabled>
                                                </div>
                                            
                                        @else
                                                <div class="col-md-12"><label class="labels">Instagram</label>
                                                    <input type="text" class="form-control" placeholder="enter your instagram account" value="" name="instagram" disabled>
                                                </div>
                                        @endif
                                    </div>
                                    <div class="p-3 py-3">
                                        <div class="d-flex justify-content-between align-items-center experience"><span>Personal Branding</span></div><br>
                                        @if(isset($profiles))
                                            
                                                <div class="col-md-12"><label class="labels">About Me</label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="describe yourself" value="" name="branding" disabled>{{ $profiles->branding }}</textarea>
                                                </div>
                                            
                                        @else
                                                <div class="col-md-12"><label class="labels">About Me</label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="describe yourself" value="" name="branding" disabled></textarea>
                                                </div>
                                        @endif
                                    </div>
                                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/utils.js",
    });
</script>
@endsection
