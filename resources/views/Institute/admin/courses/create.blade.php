@extends('institute.layouts.admin')

@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/>
<script src="{{asset('js/mdtimepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/mdtimepicker.min.css')}}"/>

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

<script>

    create_course = () => {
        return {
            start_date: null,
            end_date: null,
            examination: null,
            faculties: null,
            start_date_picker: null,
            end_date_picker: null,
            timings: [],
            mounted() {
                this.start_date_picker = new Litepicker({
                    element: document.getElementById('start_date'),
                    singleMode: true,
                    resetButton: true,                    
                    setup: (picker) => {
                        picker.on('selected', (date) => {
                            this.start_date = date.dateInstance.toLocaleDateString('en-CA');
                        });
                    },
                });
                this.end_date_picker = new Litepicker({
                    element: document.getElementById('end_date'),
                    singleMode: true,
                    resetButton: true,
                    setup: (picker) => {
                        picker.on('selected', (date) => {
                            this.end_date = date.dateInstance.toLocaleDateString('en-CA');
                        });
                    },
                });
                $("#examination").select2({
                    placeholder: "Select an examination",
                });
                $("#faculties").select2({
                    placeholder: "Select faculties",
                });
            },
            createTimePicker(selector){
                $(selector).mdtimepicker({
                    timeFormat: 'hh:mm:ss tt',
                    format: 'hh:mm tt',
                    readOnly: true,
                    theme: 'blue',
                    hourPadding: true,
                })
            },
            addTiming(){
                this.timings.push({
                    day: null,
                    start_time: null,
                    end_time: null,
                });
            },
            removeTiming(index){
                this.timings.splice(index, 1);
            },
        }
    }

</script>

<div class="row">
    <div class="col-12">
        <div>
            <h1 class="text-2xl font-bold tracking-tight filament-header-heading">
                <span>Courses</span>&nbsp;>&nbsp;<span style="font-weight: 300;">Create</span>
            </h1>    
        </div>

        <div class="mb-3 row">
            <div class="col-6">
                <div class="flex d-flex">
                    <div>
                        <a href="{{ route('institute.dashboard.courses.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-angle-left me-2"></i> Back
                        </a>
                    </div>
        
                    <div class="ml-2">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
       
        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;">
            @if ($faculties->count() > 0 && $examinations->count() > 0)
                <form action="{{ route('institute.dashboard.courses.store') }}" method="POST" id="faculty_update_form">
                    @csrf
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

                    <div class="card-body" x-data="create_course" x-init="mounted">
                            <h5 class="mb-3 card-title">BASIC DETAILS</h5>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Name</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The name of the course
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Description</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            A brief description of the course
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Faculties</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The faculties that teach this course
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" id="faculties" name="faculties[]" multiple="multiple" required>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                        
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Examination</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The examination that this course is for
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" id="examination" name="examination" required>
                                        @foreach ($examinations as $examination)
                                            <option value="{{ $examination->id }}">{{ $examination->name }}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>   
                            <hr class="my-5">
                            <h5 class="mb-3 card-title">DURATION</h5>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Start date</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The date when the course starts
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" x-model="start_date" class="form-control" name="start_date" id="start_date" required>
                                </div>
                            </div> 
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>End date</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The date when the course ends
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" x-model="end_date" class="form-control" name="end_date" id="end_date" required>
                                </div>
                            </div> 
                            <hr class="my-5">
                            <h5 class="mb-3 card-title">TIMINGS</h5>
                            <div class="mb-5 row">
                                <template x-for="(field, index) in timings" :key="index">
                                    <div class="mb-3">
                                        <h6 class="mb-2 card-title">
                                            <strong>Day <span x-text="index + 1"></span></strong>
                                        </h6>
                                        <div class="gap-2 d-flex">
                                            <div class="col-md-4">
                                                <label class="mb-1 h4">
                                                    <strong>Day of the week</strong>
                                                </label>
                                                <select class="form-control" name="day" x-model="field.day" required>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-1 h4">
                                                    <strong>Start time</strong>
                                                </label>
                                                <input type="time" class="form-control timepicker-ui-input" name="start_time" x-model="field.start_time" required :id="'time1'+index" x-init="createTimePicker('#time1'+index)">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-1 h4">
                                                    <strong>End time</strong>
                                                </label>
                                                <input type="time" class="form-control timepicker-ui-input" name="end_time" x-model="field.end_time" required :id="'time2'+index" x-init="createTimePicker('#time2'+index)">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button class="btn btn-danger" type="button" @click="removeTiming(index)">Remove</button>
                                            </div>
                                        </div>
                                    </div>    
                                </template>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button" @click="addTiming">Add timing</button>
                                </div>
                            </div>
                            <hr class="my-5">
                            <h5 class="mb-3 card-title">FEE DETAILS</h5>
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Total fee</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The total fee for the course payable per year (in INR)
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="total_fee" required>
                                </div>
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <span @click="submitForm">
                            <x-loadingbutton type="submit">Create</x-loadingbutton>
                        </span>
                    </div>
                </form>
            @else
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" 
                    >
                        <strong>Attention</strong>
                        <div>
                            <p>Looks like you don't have any faculties or examinations in the system :(<br> Please create them first.</p>
                        </div>
                    </div>                            
                </div>
            @endif
        </div>


    </div>
</div>

@endsection