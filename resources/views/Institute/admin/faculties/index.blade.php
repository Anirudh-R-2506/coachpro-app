@extends('institute.layouts.admin')

@section('css')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script defer>
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

    newFaculty = () => {
        return {
            subjects: [],
            name: {errorMessage:'', blurred:false},
            experience: {errorMessage:'', blurred:false},
            qualification: {errorMessage:'', blurred:false},
            getErrorMessage: function(value, rules) {
                let isValid = Iodine.is(value, rules);
                if (isValid !== true) {
                    return Iodine.getErrorMessage(isValid);
                }
                return '';
            },
            blur: function(event) {
                let ele = event.target;
                this[ele.name].blurred = true;
                let rules = JSON.parse(ele.dataset.rules)
                this[ele.name].errorMessage = this.getErrorMessage(ele.value, rules);
            },
            input: function(event) {
                let ele = event.target;
                let rules = JSON.parse(ele.dataset.rules)
                this[ele.name].errorMessage = this.getErrorMessage(ele.value, rules);
            },
            clicked: function(event) {
                let ele = event.target;
                let rules = JSON.parse(ele.dataset.rules)
                this[ele.name].errorMessage = this.getErrorMessage(ele.value, rules);
            },
            initSub(){
                this.addSubject();
            },
            addSubject(){
                this.subjects.push({
                    name: '',
                });
            },
            removeSubject(index){
                if (this.subjects.length > 1)
                    this.subjects.splice(index, 1);
                else
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You must have atleast one Subject!',
                    });
            },
            submit(){
                Swal.showLoading();
                let sub = [];
                this.subjects.forEach((subject) => {
                    sub.push(subject.name);
                });
                axios.post("{{route('institute.dashboard.faculties.store')}}", {
                    name: document.getElementById('name').value,
                    experience: document.getElementById('experience').value,
                    qualification: document.getElementById('qualification').value,
                    subjects: sub,
                })
                .then((response) => {
                    if (response.data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.data.message,
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data.message,
                        });
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                });
            },
        }
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
                    <div class="m-3 modal-body" x-data="newFaculty" x-init="initSub">

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
                                           type="text" class="form-control" id="name" name="name" placeholder="John Doe" @change="clicked">
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
                                           type="text" class="form-control" id="qualification" name="qualification" placeholder="MS, PhD" @change="clicked">                                    
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
                                           type="number" class="form-control" id="experience" name="experience" placeholder="15" @change="clicked">                                    
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="h4">
                                    <strong>Subjects</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        The subjects taught by the faculty
                                    </small>
                                </p>
                            </div>
                            <div class="mb-5 row">
                                <template x-for="(field, index) in subjects" :key="index">
                                    <div class="mb-3">
                                        <h6 class="mb-2 card-title">
                                            <strong>Subject <span x-text="index + 1"></span></strong>
                                        </h6>
                                        <div class="gap-2 d-flex">
                                            <div class="col-md-10">
                                                <label class="mb-1 h4">
                                                    <strong>Subject name</strong>
                                                </label>
                                                <input type="text" class="form-control" name="subject" x-model="field.name" required>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button class="btn btn-danger" type="button" @click="removeSubject(index)">Remove</button>
                                            </div>
                                        </div>
                                    </div>    
                                </template>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button" @click="addSubject">Add Subject</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <span @click="submit">
                                    <x-loadingbutton type="button">Create</x-loadingbutton>
                                </span>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;">
            <div class="card-body" style="padding: 0px !important;">
                <div class="mb-2 row">
                    <div class="px-4 py-2 col-md-12">                            
                        @if($faculties->count() > 0)
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
                        @else
                            <div class="mt-2">
                                <img src="{{ asset('images/empty.png') }}" class="mx-auto mb-4 d-block">
                                <h1 class="text-center">
                                    <strong>
                                        No faculties found
                                    </strong>
                                </h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
