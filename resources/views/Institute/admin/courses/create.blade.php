@extends('institute.layouts.admin')

@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    #faculty_update_form > div.card-body > div:nth-child(5) > div.col-md-9 > span > span.selection > span, #faculty_update_form > div.card-body > div:nth-child(4) > div.col-md-9 > span > span.selection > span
    {
        border-radius: 15px !important;
        background-clip: padding-box;
        background-color: #fff;
        border-radius: 0.2rem;
        color: #495057;
        display: block;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        padding-top: 5px;
        padding-bottom: 10px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        width: 100%;
    }

    
</style>


<style>

    

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
            faqs: [],
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
                    theme: "bootstrap"
                });
                $("#faculties").select2({
                    placeholder: "Select faculties",
                    theme: "bootstrap"
                });
                this.timings.push({
                    day: null,
                    start_time: null,
                    end_time: null,
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
            addFaq(){
                this.faqs.push({
                    question: null,
                    answer: null,
                });
            },
            removeFaq(index){
                if (this.faqs.length > 1)
                    this.faqs.splice(index, 1);
                else
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You must have atleast one FAQ!',
                    });
            },
            removeTiming(index){
                if (this.timings.length > 1)
                    this.timings.splice(index, 1);
                else
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You must have atleast one class timing!',
                    });
            },
            submitForm(){
                let form = document.getElementById('course_create_form');
                let formData = new FormData(form);
                let name = document.getElementById('name').value;
                let description = document.getElementById('description').value;
                let examination = document.getElementById('examination').value;
                let faculties = document.getElementById('faculties').value;
                let total_fee = document.getElementById('total_fee').value;
                
                formData.append('name', name);
                formData.append('description', description);
                formData.append('total_fee', total_fee);
                formData.append('start_date', this.start_date);
                formData.append('end_date', this.end_date);
                formData.append('examination', examination);
                formData.append('faculties', faculties);
                formData.append('timings', this.timings);
                formData.append('faqs', this.faqs);                
                
                axios.post('{{ route('institute.dashboard.courses.store') }}', formData)
                .then((response) => {
                    if (response.data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.data.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('institute.dashboard.courses.index') }}';
                            }
                        });
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
                        text: 'Something went wrong! Try again later.',
                    });
                });
            }
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
                <form id="course_create_form">
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
                                    <input type="text" class="form-control" name="name" id="name" required>
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
                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
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
                            <h5 class="mb-3 card-title">CLASS TIMINGS</h5>
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
                            <h5 class="card-title" style="margin-bottom: 0rem !important;">FAQs</h5>
                            <p class="mb-3 text-muted" style="margin-bottom: 1rem !important;">
                                <small>
                                    Add frequently asked questions about the course
                                </small>
                            </p>
                            <div class="mb-5 row">
                                <template x-for="(field, index) in faqs" :key="index">
                                    <div class="mb-3">
                                        <h6 class="mb-2 card-title">
                                            <strong>FAQ <span x-text="index + 1"></span></strong>
                                        </h6>
                                        <div class="gap-2 d-flex">
                                            <div class="col-md-5">
                                                <label class="mb-1 h4">
                                                    <strong>Question</strong>
                                                </label>
                                                <textarea class="form-control" name="question" x-model="field.question" required></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="mb-1 h4">
                                                    <strong>Answer</strong>
                                                </label>
                                                <textarea class="form-control" name="answer" x-model="field.answer" required></textarea>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button class="btn btn-danger" type="button" @click="removeFaq(index)">Remove</button>
                                            </div>
                                        </div>
                                    </div>    
                                </template>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="button" @click="addFaq">Add FAQ</button>
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
                                    <input type="number" class="form-control" id="total_fee" name="total_fee" required>
                                </div>
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <span @click="submitForm">
                            <x-loadingbutton>Create</x-loadingbutton>
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