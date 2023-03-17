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
    
    editFaculty = () => {
        return {
            subjects: [],
            name: {errorMessage:'', blurred:false},
            experience: {errorMessage:'', blurred:false},
            qualification: {errorMessage:'', blurred:false},
            showAlert: false,
            clickedInput() {
                console.log('clicked');
                if(this.showAlert == false) {
                    this.showAlert = true;
                }
            },
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
            initEdit(){
                let sub = @json($faculty->subjects);
                sub.forEach((subject) => {
                    this.subjects.push({
                        name: subject,
                    });
                });
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
                axios.post("{{route('institute.dashboard.faculties.update', $faculty->id)}}", {
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
                            window.location.href = "{{route('institute.dashboard.faculties.index')}}";
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
       
        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;" x-data="editFaculty()" x-init="initEdit()">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $faculty->name }}" placeholder="{{ $faculty->name }}" x-on:change="clickedInput()">                                    
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
                                <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $faculty->qualification }}" placeholder="{{ $faculty->qualification }}" x-on:change="clickedInput()">                                    
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
                                <input type="number" class="form-control" id="experience" name="experience" value="{{ $faculty->experience }}" placeholder="{{ $faculty->experience }}" x-on:change="clickedInput()">                                    
                            </div>
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
                                            <input type="text" class="form-control" name="subject" x-model="field.name" required x-on:change="clickedInput()">
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
                </div>
                <div class="modal-footer" x-show="showAlert">
                    <span @click="submit">
                        <x-loadingbutton type="submit">Save</x-loadingbutton>
                    </span>
                </div>
            </form>
        </div>


    </div>
</div>
@endsection
