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
                    Leads
                    <br>
                    <small style="font-size: 0.9rem; font-weight: 300;">
                        All the leads towards your institute
                    </small>
                </h1>                
            </div>
        </div>  

        <div class="alert alert-info" role="alert" 
        >
            <strong>Hey {{auth()->user()->name}}</strong><br>
            This is a demo of how bookings/converted leads are delivered to your institute. <br>
        </div>

        <div class="mt-3 card mild-border" style="border-radius: 1.5rem;">
            <div class="card-body" style="padding: 0px !important;">
                <div class="mb-2 row">
                    <div class="px-4 py-2 col-md-12">                            
                        @include('includes.search-filter', [
                                'filters' => [
                                    'Status' => \App\Models\Bookings::enum('status')->getFilter(),
                                ],
                                'index' => [
                                    'Status' => 3,
                                ],
                                'table' => 'table',
                                'search' => true,
                                'placeholder' => 'Search bookings...',
                                'buttons' => [
                                    'Export' => [
                                        'url' => '#'/* route('institute.admin.leads.export') */,
                                        'class' => 'btn btn-primary',
                                        'icon' => 'fas fa-file-export',
                                        'target' => '_blank',
                                    ],
                                ],
                                /* 'download_link' => route('institute.admin.bookings.download'), */
                        ])
                        <table id="table" class="table table-striped mild-border-t mild-border-b" style="width:100%; font-size: 1rem; margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="col-4">{{ $user['name'] }}</td>
                                    <td class="col-4">{{ $user['course'] }}</td>
                                    <td class="col-2">
                                        <a href="#" class="text-blue-500 hover:text-blue-600 btn btn-primary btn-sm" style="">
                                            <i class="fas fa-phone"></i>&nbsp;Call now
                                        </a>
                                    </td>
                                    <td class="col-2">{!! \App\Models\Bookings::enum('status')->getBadge($user['status']) !!}</td>
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
