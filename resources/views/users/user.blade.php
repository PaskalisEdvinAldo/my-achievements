@extends('layouts.main')

@section('title', 'MyAchievements | User Information')

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
        <div class="col-md-6 border-right">
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
                
                <a href="{{ route('users.edit', ['id' => $users->id]) }}" class="btn btn-warning m-1 btn-sm align-item-center"><i class="bi bi-pencil-square">
                    <span>
                    Edit User Info
                    </span></i>
                </a>
            </div>

        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">User Data</h4>
                </div>
                    @if(isset($users))
                        <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Full Name</label>
                                    <input type="text" id="fullname" class="form-control" placeholder="full name" value="{{ $users->fullname }}" name="fullname" disabled>
                                </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Nickname</label>
                                <input type="text" id="nickname" class="form-control" value="{{ $users->nickname }}" placeholder="Nickname" name="nickname" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text" id="email" class="form-control" value="{{ $users->email }}" placeholder="email" name="email" disabled>
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
