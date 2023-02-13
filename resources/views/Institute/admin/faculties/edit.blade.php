@extends('institute.layouts.admin')

@section('css')
<script>

    function trigger_delete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

            Swal.showLoading();

            if (result.isConfirmed) {
                document.getElementById('delete_faculty_form').submit();                
            }
        });
    }

    function showUnsavedAlert() {
        return {
            showAlert: false,

            clicked() {
                if(this.showAlert == false) {
                    this.showAlert = true;
                }
            },

            submitForm() {
                document.getElementById('faculty_update_form').submit();
            }

        }
    }        
</script>
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div>
            <h1 class="text-2xl font-bold tracking-tight filament-header-heading">
                <span>Faculties</span>&nbsp;>&nbsp;<span style="font-weight: 300;">Edit</span>
            </h1>    
        </div>

        <div class="mb-3 row">
            <div class="col-6">
                <div class="flex d-flex">
                    <div>
                        <a href="{{ route('institute.dashboard.faculties.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-angle-left me-2"></i> Back
                        </a>
                    </div>
        
                    <div class="ml-2">
                        &nbsp;
                    </div>
        
        
        
                    <div class="">
                        <button class="btn btn-danger" type="button" onclick="trigger_delete();">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
        
                        <form action="{{ route('institute.dashboard.faculties.delete', $faculty->id) }}" id="delete_faculty_form" method="POST">@csrf @method('DELETE')</form>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="p-2 mt-3 card" x-data="showUnsavedAlert()">
            <form action="{{ route('institute.dashboard.faculties.update', $faculty->id) }}" method="POST" id="faculty_update_form">
                @csrf
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" x-show="showAlert" x-cloak
                        x-transition:enter.duration.500ms
                        x-transition:leave.duration.400ms
                    >
                        <strong>Attention</strong>
                        Unsaved changes, click "Save" to save all changes
                    </div>
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

                <div class="card-body">
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
                                <input type="text" class="form-control" name="name" value="{{ $faculty->name }}" placeholder="{{ $faculty->name }}" @change="clicked">                                    
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
                                <input type="text" class="form-control" name="qualification" value="{{ $faculty->qualification }}" placeholder="{{ $faculty->qualification }}" @change="clicked">                                    
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
                                <input type="number" class="form-control" name="experience" value="{{ $faculty->experience }}" placeholder="{{ $faculty->experience }}" @change="clicked">                                    
                            </div>
                        </div>                        
                </div>
                <div class="modal-footer" x-show="showAlert">
                    <span @click="submitForm">
                        <x-loadingbutton type="submit">Save</x-loadingbutton>
                    </span>
                </div>
            </form>
        </div>


    </div>
</div>
@endsection
