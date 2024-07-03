@extends('layouts.main')

@section('title', 'MyAchievements | Achievements Summary')

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

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Achievements Summary</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Your Achievements Summary</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="achievementsummary" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Classification</th>
                                        <th>Level</th>
                                        <th>Role/Position</th>
                                        <th>Description</th>
                                        <th>Achievement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if(isset($sertifikats) && $sertifikats->isNotEmpty())
                                        @foreach($sertifikats as $sertifikat)
                                            <tr>
                                                <td>{{ $sertifikat->event_name }}</td>
                                                <td>{{ $sertifikat->classification }}</td>
                                                <td>{{ $sertifikat->level }}</td>
                                                <td>{{ $sertifikat->role }}</td>
                                                <td>{{ $sertifikat->description }}</td>
                                                <td>{{ $sertifikat->achievement }}</td>
                                                <td>
                                                    <a href="/storage/{{ $sertifikat->award }}" class="btn btn-primary m-1 btn-sm"><i class="bi bi-eye-fill"><span>View</span></i></a>
                                                        <div>
                                                            <a href="{{ route('certificates.edit', ['user_id' => $sertifikat->user_id, 'id' => $sertifikat->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                                <i class="bi bi-pencil-square"></i>
                                                                <span>Update</span>
                                                            </a>
                                                            <form action="{{ route('certificates.destroy', ['user_id' => $sertifikat->user_id, 'id' => $sertifikat->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-sertifikat-id="{{ $sertifikat->id }}">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js" defer></script>
<script>
    $(document).ready(function (){
        $('#achievementsummary').DataTable();
    });
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delete-button')) {
            e.preventDefault();
            const sertifikatId = e.target.getAttribute('data-sertifikat-id');
            if (confirm('Are you sure want to delete this certificate?')) {
                document.getElementById('deleteForm_' + sertifikatId).submit();
            }
        }
    });
</script>
@endsection