{{-- <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
<link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" /> --}}

{{-- SELECT2 --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

{{-- LITEPICKER --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/> --}}

@extends('institute.layouts.admin')

@section('css')

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
                    Courses
                    <br>
                    <small style="font-size: 0.9rem; font-weight: 300;">
                        Courses taken by the institute
                    </small>
                </h1>                
            </div>
            <a href="{{route('institute.dashboard.courses.create')}}" class="btn btn-primary" style="float: right !important; max-height: 3rem;">
                <i class="fa-solid fa-plus"></i> &nbsp; Add new course
            </a>
        </div>  
        
        <div class="alert alert-info" role="alert" 
        >
            <strong>Hey {{auth()->user()->name}}</strong><br>
            Each course is either a course unto itself or a batch of a course<br>
            <b>For example:</b> <br>
            If you have 3 batches for JEE coaching you must create a course for each batch separately
        </div>
       
        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;">
            <div class="card-body">
                @if($courses->count() != 0)
                    @include('includes.search-filter', [
                            'filters' => [
                                'Status' => \App\Models\Courses::enum('status')->getFilter(),
                                'Availability' => \App\Models\Courses::enum('availability')->getFilter(),
                            ],
                            'index' => [
                                'Status' => 2,
                                'Availability' => 3,
                            ],
                            'table' => 'table',
                            'search' => true,
                            'placeholder' => 'Search any course...',
                    ])
                    <table id="table" class="table table-striped mild-border-t mild-border-b" style="width:100%; font-size: 1rem; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Availability</th>
                                {{-- <th class="actions-th"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td class="col-3">{{ $course->name }}</td>
                                <td class="col-6">{{ $course->description }}</td>
                                <td class="col-3">{!! \App\Models\Courses::enum('status')->getBadge($course->status) !!}</td>                                    
                                <td class="col-3">{!! \App\Models\Courses::enum('availability')->getBadge($course->availability) !!}</td>
                                {{-- <td class="action-edit">
                                    <div class="inner">
                                        <a class="icon" href="{{ route('institute.dashboard.courses.edit', $course->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>        
                                            Edit                                    
                                        </a>                                    
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="mt-2">
                        <img src="{{ asset('images/empty.png') }}" class="mx-auto mb-4 d-block">
                        <h1 class="text-center">
                            <strong>
                                No courses found
                            </strong>
                        </h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection