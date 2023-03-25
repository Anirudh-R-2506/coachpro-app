@extends('institute.layouts.admin')

@section('css')

<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/>
<script src="{{asset('js/mdtimepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/mdtimepicker.min.css')}}"/>
<style>
    .select2-selection__choice {
        margin-top: 0px !important;
        margin-bottom: 0px !important; 
        margin-right: 0px !important;}

    #course_create_form > div.card-body > div:nth-child(4) > div.col-md-9 > span > span.selection > span > ul {
        display: flex;
        align-items: center;
    }

    .select2-selection{
        border-radius: 15px !important;
        background-clip: padding-box;
        background-color: #fff;
        color: #495057;
        display: block;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        width: 100%;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
{{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/> --}}

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
            start_date_picker: null,
            end_date_picker: null,
            timings: 0,
            faqs: 0,
            mounted() {
                formatDate = (date) => {
                    let d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    return [year, month, day].join('-');
                }
                
                this.start_date_picker = new Litepicker({
                    element: document.getElementById('start_date'),
                    singleMode: true,
                    resetButton: true,                    
                    setup: (picker) => {
                        picker.on('selected', (date) => {
                            let Newdate = formatDate(date.dateInstance);
                            if (Newdate == this.end_date){
                                this.end_date_picker.clearSelection();
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Start date and end date cannot be same',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                            else if(Newdate > this.end_date){
                                this.end_date_picker.clearSelection();
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Start date cannot be greater than end date',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                            else{
                                this.start_date = Newdate;
                            }                                
                        });
                    },
                });             
                this.end_date_picker = new Litepicker({
                    element: document.getElementById('end_date'),
                    singleMode: true,
                    resetButton: true,
                    setup: (picker) => {
                        picker.on('selected', (date) => {
                            let Newdate = formatDate(date.dateInstance);
                            if (Newdate == this.start_date){
                                this.start_date_picker.clearSelection();
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Start date and end date cannot be same',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                            else if(Newdate < this.start_date){
                                this.start_date_picker.clearSelection();
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'End date cannot be less than start date',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                            else{
                                this.end_date = Newdate;
                            }
                        });
                    },
                });
                this.addTiming();
                $('#faculties').select2({
                    theme: 'bootstrap4',
                    width: 'style',
                });
            },
            range(start, end) {
                return (start > end || start == end) ? Array() : Array(end - start).fill().map((_, idx) => start + idx);
            },
            createTimePicker(selector){
                $(selector).mdtimepicker({
                    timeFormat: 'hh:mm:ss tt',
                    format: 'hh:mm tt',
                    readOnly: true,
                    theme: 'blue',
                    hourPadding: true,
                });
            },
            addTiming(){
                this.timings++;
            },
            addFaq(){
                this.faqs++;
            },
            removeFaq(index){
                this.faqs--;
            },
            removeTiming(index){
                if (this.timings >= 1)
                    this.timings--;
                else
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You must have atleast one class timing!',
                    });
            },
            getTimings(){
                let length = this.timings;
                let timings = [];
                for (let i = 0; i < length; i++){
                    let day = document.getElementById('day'+i).value;
                    let start_time = document.getElementById('start' + i).value;
                    let end_time = document.getElementById('end' + i).value;
                    if (start_time > end_time){
                        Swal.fire({
                            title: 'Error!',
                            text: 'Start time cannot be greater than end time (in day '+day+')',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        return false;
                    }
                    if (start_time == end_time){
                        Swal.fire({
                            title: 'Error!',
                            text: 'Start time cannot be same as end time (in day '+day+')',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        return false;
                    }
                    if (day != '' && start_time != '' && end_time != ''){
                        let time = [day, start_time, end_time];
                        timings.push(time);
                    }
                }
                return timings;
            },
            getFaqs(){
                let length = this.faqs;
                if (length == 0) return [];
                let faqs = [];
                for (let i = 0; i < length; i++){
                    let question = document.querySelector(`#question${i}`).value;
                    let answer = document.querySelector(`#answer${i}`).value;
                    if (question != '' && answer != ''){
                        let faq = [];
                        faq['question'] = question;
                        faq['answer'] = answer;
                        faqs.push(faq);
                    }
                }
                return faqs;
            },
            submitForm(){
                /* let video = document.querySelector('input[name="video"]').value;
                if (video == '' || video == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please wait for the video to finish uploading',
                    });
                    return;
                } */
                let name = document.getElementById('name').value;
                let description = document.getElementById('description').value;
                let examination = document.getElementById('examination').value;
                let faculties = $('#faculties').val();
                let total_fee = document.getElementById('total_fee').value;  
                let video = document.getElementById('video').value;
                let times = this.getTimings();
                let questions = this.getFaqs();
                console.log(times, questions);
            
                if (name == '' || name == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a name for the course',
                    });
                    return;
                }
                if (description == '' || description == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a description for the course',
                    });
                    return;
                }
                if (total_fee == '' || total_fee == null || total_fee == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a total fee for the course',
                    });
                    return;
                }
                if (examination == '' || examination == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an examination for your course',
                    });
                    return;
                }
                if (faculties == [] || faculties == null || faculties.length == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select atleast one faculty for your course',
                    });
                    return;
                }
                if (times.length == 0 || times == null || times == []){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please add atleast one class timing for your course',
                    });
                    return;
                }              
                
                let data = JSON.stringify({
                    'name' : name,
                    'description' : description,
                    'examination' : examination,
                    'faculties' : faculties,
                    'total_fee' :  total_fee,
                    'video' : video,
                    'start_date' : this.start_date,
                    'end_date' : this.end_date,
                    'timings' : times,
                    'faqs' : questions,
                });


                
                axios.post('{{ route('institute.dashboard.courses.store') }}', data, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
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
            },
            logTimings(){
                console.log(this.getTimings());
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
            @if ($faculties->count() > 0)
                <form id="course_create_form" x-data="create_course" x-init="mounted">

                    <div class="card-body">
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
                                    <select multiple="multiple" id="faculties" name="faculties[]">
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                        
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>
                                            Examination/Skill
                                        </strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The examination/skill that this course prepares for
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" id="examination" name="examination">
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
                                <template x-for="index in range(0, timings)">
                                    <div class="mb-3">
                                        <h6 class="mb-2 card-title">
                                            <strong>Day <span x-text="index + 1"></span></strong>
                                        </h6>
                                        <div class="flex-wrap gap-2 d-flex">
                                            <div class="col-md-4">
                                                <label class="mb-1 h4">
                                                    <strong>Day of the week</strong>
                                                </label>
                                                <select class="form-control" name="day" :id="'day' + index" required>
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
                                                <input type="time" class="form-control timepicker-ui-input" name="start_time" :id="'start' + index" required x-init="createTimePicker('#start'+index)">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-1 h4">
                                                    <strong>End time</strong>
                                                </label>
                                                <input type="time" class="form-control timepicker-ui-input" name="end_time" :id="'end' + index" required x-init="createTimePicker('#end'+index)">
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
                                <strong>
                                    Add frequently asked questions about the course
                                </strong>
                            </p>
                            <div class="mb-5 row">
                                <template x-for="index in range(0,faqs)">
                                    <div class="mb-3">
                                        <h6 class="mb-2 card-title">
                                            <strong>FAQ <span x-text="index + 1"></span></strong>
                                        </h6>
                                        <div class="flex-wrap gap-2 d-flex">
                                            <div class="col-md-5">
                                                <label class="mb-1 h4">
                                                    <strong>Question</strong>
                                                </label>
                                                <textarea class="form-control" name="question" :id="'question' + index" required></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="mb-1 h4">
                                                    <strong>Answer</strong>
                                                </label>
                                                <textarea class="form-control" name="answer" :id="'answer' + index" required></textarea>
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
                                    <input type="number" class="form-control" id="total_fee" name="total_fee">
                                </div>
                            </div> 
                            <hr class="my-5">
                            <h5 class="mb-3 card-title">DEMO LECTURE</h5>
                            <div class="alert alert-info" role="alert" x-cloak
                                x-transition:enter.duration.500ms
                                x-transition:leave.duration.400ms
                            >
                                <strong>Hey {{auth()->user()->name}}</strong><br>
                                Your demo video lecture is limited to one hour per course divided equally among the faculties taking the course. Our experienced editors will work their magic on it and uplift your video to a whole other level.<br>
                                <b>Ensure the video in your storage platform, for example google drive, is publicly accesible</b>
                            </div>
                            <div class="mb-5 row">                                
                                {{-- <div class="col-md-12">
                                    <div class="dropzone dz-clickable" style="border-radius: 10px;" id="demo_lecture">
                                        <!--begin::Message-->
                                        <div class="dz-message needsclick">
                                            <!--begin::Icon-->
                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                            <!--end::Icon-->
                
                                            <!--begin::Info-->
                                            <div class="ms-4">
                                                <h3 class="mb-1 text-gray-900 fs-5 fw-bolder">Drop video here or click to upload.</h3>
                                                <span class="opacity-75 fs-7 fw-bold text-primary">This is a demo lecture presented to the students</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Lecture Link</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            A public link to your video lecture
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="video" id="video">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <span @click="submitForm()">
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
                            <p>Looks like you don't have any faculties registered with your institute :(<br> Please create them first.</p>
                        </div>
                    </div>                            
                </div>
            @endif
        </div>


    </div>
</div>

<script>
/* let dropzone = new Dropzone("#demo_lecture", {
    url: "{{route('institute.services.video.upload')}}",
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    maxFilesize: 1000, // MB
    addRemoveLinks: true,
    chunking: true,
    forceChunking: true,
    acceptedFiles: "video/*",
    disablePreviews: true,
    accept: function(file, done) {
        done();
    }
});
 */
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


@endsection