@extends('institute.layouts.admin')

@section('css')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script defer>
    function createFaculty(id)
    {
        document.getElementById(`${id}`).submit();
    }
    
    function trigger_delete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3056d3',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

            Swal.showLoading();

            if (result.isConfirmed) {
                document.getElementById(`delete_faculty_form_${id}`).submit();
            }
        });
    }

    alterRole = () => {
        console.log(event.target.value);
    }
</script>
<style>
    .badge-warning {
        background-color: #f0ad4e;
        color: #fff;
    }
    .badge-success {
        background-color: #5cb85c;
        color: #fff;
    }
    .badge-danger {
        background-color: #d9534f;
        color: #fff;
    }
    .badge-info {
        background-color: #5bc0de;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight filament-header-heading">
                    Faculties
                    <br>
                    <small style="font-size: 0.9rem; font-weight: 300;">
                        List of all faculties working in the institute
                    </small>
                </h1>                
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary" style="float: right !important; max-height: 3rem;">
                <i class="fa-solid fa-plus"></i> &nbsp; Add new faculty
            </button>
        </div>  

        @if ($errors->any())
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert" x-cloak
                        x-transition:enter.duration.500ms
                        x-transition:leave.duration.400ms
                        >
                            <strong>Attention</strong>
                            <div>
                                <p>Looks like you have a few errors in your submission :(</p>
                                <ul class="list-group alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>                            
                    </div>
        @endif             
        <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mt-3 modal-header" style="margin-left: 1rem !important;">
                        <h3 class="font-bold">
                            Add new faculty
                            <br>
                            <small style="font-size: 0.9rem; font-weight: 300;">
                                Add a new faculty to the institute
                            </small>
                        </h3>           
                    </div>
                    <div class="m-3 modal-body">

                        <form action="{{ route('institute.dashboard.faculties.store') }}" id="new_faculty_form" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Name</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The name of the faculty
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input @blur="blur" @input="input" data-rules='["required","string"]'
                                           type="text" class="form-control" name="name" placeholder="John Doe" @change="clicked">
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Qualification</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The qualification of the faculty
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input @blur="blur" @input="input" data-rules='["required","string"]'
                                           type="text" class="form-control" name="qualification" placeholder="MS, PhD" @change="clicked">                                    
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Experience</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The teaching experience of the faculty (in years)
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input @blur="blur" @input="input" data-rules='["required","number"]'
                                           type="number" class="form-control" name="experience" placeholder="15" @change="clicked">                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <span onclick="createFaculty('new_faculty_form')">
                                    <x-loadingbutton type="button">Create</x-loadingbutton>
                                </span>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="mt-3 card mild-border" style="border-radius: 1.5rem;">
            <div class="card-body" style="padding: 0px !important;">
                <div class="mb-2 row">
                    <div class="px-4 py-2 col-md-12">                            
                        @include('includes.search-filter', [
                                'filters' => null,
                                'table' => 'table',
                                'search' => true,
                                'placeholder' => 'Search any faculty...',
                        ])
                        <table id="table" class="table table-striped mild-border-t mild-border-b" style="width:100%; font-size: 1rem; margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qualification</th>
                                    <th>Experience</th>
                                    <th class="actions-th"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faculties as $user)
                                <tr>
                                    <td class="col-4">{{ $user->name }}</td>
                                    <td class="col-4">{{ $user->qualification }}</td>
                                    <td class="col-4">{{ $user->experience }}</td>                                    
                                    <td class="action-edit">
                                        <div class="inner">
                                            <a class="icon" href="{{ route('institute.dashboard.faculties.edit', $user->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>        
                                                Edit                                    
                                            </a>                                    
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
