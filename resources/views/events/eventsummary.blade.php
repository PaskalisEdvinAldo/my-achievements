@extends('layouts.main')

@section('title', 'MyAchievements | Events Summary')

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
        <h1 class="h3 mb-4 text-gray-800">Events Summary</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Events Track Record</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="eventsummary" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Grade</th>
                                        <th>Area of Expertise</th>
                                        <th>Event Selection</th>
                                        <th>Activity Field</th>
                                        <th>Event Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    @if(isset($lombas) && $lombas->isNotEmpty())
                                        @foreach($lombas as $lomba)
                                            <tr>
                                                <td>{{ $lomba->fullname }}</td>
                                                <td>{{ $lomba->grade }}</td>
                                                <td>{{ $lomba->expertise }}</td>
                                                <td>{{ $lomba->event_select }}</td>
                                                <td>{{ $lomba->event_field }}</td>
                                                <td>{{ $lomba->event_type }}</td>
                                                <td>
                                                        <div>
                                                            <a href="{{ route('events.edit', ['user_id' => $lomba->user_id, 'id' => $lomba->id]) }}" class="btn btn-warning m-1 btn-sm">
                                                                <i class="bi bi-pencil-square"></i>
                                                                <span>Update</span>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <form action="{{ route('events.destroy', ['user_id' => $lomba->user_id, 'id' => $lomba->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger m-1 btn-sm delete-button" data-lomba-id="{{ $lomba->id }}">
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
        $('#eventsummary').DataTable();
    });
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('delete-button')) {
            e.preventDefault();
            const lombaId = e.target.getAttribute('data-lomba-id');
            if (confirm('Are you sure want to delete this event data?')) {
                document.getElementById('deleteForm_' + lombaId).submit();
            }
        }
    });
</script>
@endsection