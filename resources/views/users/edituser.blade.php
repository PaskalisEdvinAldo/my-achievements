@extends('layouts.main')

@section('title', 'MyAchievements | Update User Data')

@section('container')
<div class="container-fluid">

    @php
        $oldMotherName = session('oldMotherName', $user->mother_name);
    @endphp

    <form id="edituser" name="edituser" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @method('PUT')
        @csrf
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
                                        <input type="text" id="fullname" class="form-control @error('fullname')
                                        is-invalid @enderror" placeholder="full name" value="{{ $user->fullname }}" name="fullname" required autofocus>
                                        @error('fullname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Nickname</label>
                                    <input type="text" id="nickname" class="form-control @error('nickname')
                                    is-invalid @enderror" value="{{ $user->nickname }}" placeholder="Nickname" name="nickname" required>
                                    @error('nickname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" id="email" class="form-control" value="{{ $user->email }}" placeholder="email" name="email" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group">
                                    <select id="category" class="form-select @error('category') is-invalid @enderror" name="category" value="{{ old('category', $user->category) }}" required>
                                        <option selected disabled>choose category</option>
                                        <option value="Fiction" {{ $user->category == 'Fiction' ? 'selected' : '' }}>Fictional Character Name</option>
                                        <option value="Pet" {{ $user->category == 'Pet' ? 'selected' : '' }}>Pet Name</option>
                                        <option value="Place" {{ $user->category == 'Place' ? 'selected' : '' }}>Favorite Place</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="fictional_character" style="{{ $user->category == 'Fiction' ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('fictional_character') is-invalid @enderror" id="fictional_character" name="fictional_character" placeholder="Fictional Character Name" value="{{ $user->fictional_character }}">
                                        @error('fictional_character')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div id="pet_name" style="{{ $user->category == 'Pet' ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('pet_name') is-invalid @enderror" id="pet_name" name="pet_name" placeholder="Pet's Name" value="{{ $user->pet_name }}">
                                        @error('pet_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div id="favorite_place" style="{{ $user->category == 'Place' ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('favorite_place') is-invalid @enderror" id="favorite_place" name="favorite_place" placeholder="Favorite Place" value="{{ $user->favorite_place }}">
                                        @error('favorite_place')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 text-center"><a href="{{ route('users.index') }}" class="btn btn-primary bg-dark border-0 profile-button"><i class="bi bi-arrow-left"></i> Back</a></div>
                <div class="col-md-6 text-center"><button class="btn btn-primary bg-success border-0 profile-button" type="submit"><i class="bi bi-floppy-fill"></i> Update</button></div>
            </div>
    </form>
</div>

<script>
    // Atur tampilan berdasarkan kategori yang dipilih
    document.addEventListener('DOMContentLoaded', function() {
        var category = document.getElementById('category').value;
        showCorrectInput(category);
    });

    document.getElementById('category').addEventListener('change', function() {
        var category = this.value;
        showCorrectInput(category);
    });

    function showCorrectInput(category) {
        var fictional_character = document.getElementById('fictional_character');
        var pet_name = document.getElementById('pet_name');
        var favorite_place = document.getElementById('favorite_place');

        if (category === 'Fiction') {
            fictional_character.style.display = 'block';
            pet_name.style.display = 'none';
            favorite_place.style.display = 'none';
        } else if (category === 'Pet') {
            fictional_character.style.display = 'none';
            pet_name.style.display = 'block';
            favorite_place.style.display = 'none';
        } else if (category === 'Place') {
            fictional_character.style.display = 'none';
            pet_name.style.display = 'none';
            favorite_place.style.display = 'block';
        }
    }
</script>
@endsection
