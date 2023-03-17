@extends('institute.layouts.admin')

@section('css')
<script>

    function showUnsavedAlert() {
        return {
            showAlert: false,

            clicked() {
                if(this.showAlert == false) {
                    this.showAlert = true;
                }
            },

            submitForm() {
                document.getElementById('profile_update_form').submit();
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
                Profile
            </h1>    
        </div>
       
        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;" x-data="showUnsavedAlert()">            
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
                                    <li class="list-group-item" style="background: transparent !important; border: 0px !important;">{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>                            
                    </div>
                @endif 

                <style>
                    .box {
                        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);
                        transition: all ease 0.2s;
                        border-radius: 1.5rem;
                    }
                    .box:hover {
                        transform: translateY(-5px);
                        box-shadow: 0px 10px 20px 2px rgba(0, 0, 0, 0.25);
                        cursor: pointer;
                    }
                </style>
                <script>
                    uploadCover = () => {
                        document.getElementById('cover_photo_form').submit();
                    }
                </script>
                @php
                    $inst_media = $institute->getMedia('institute_cover')->first();
                    $inst_media = $inst_media ? $inst_media->getUrl() : asset('images/about/cover.png');
                @endphp
                <div class="card-body">
                        <div class="mb-5 box" style="width: 100%; height: 300px; background: url('{{ $inst_media }}'); background-size: 100% 100%; background-repeat: no-repeat; position: relative;">
                            <div class="d-flex justify-content-center" style="width: 100%; height: 100%; border-radius: 1.5rem; box-shadow: inset 0 -250px 300px -200px #000000;" @click="document.getElementById('cover').click()">
                                <h1 class="font-bold filament-header-heading" style="color: #fff; margin: 1rem; height: fit-content; position: absolute; bottom: 0; font-size: 1rem;">
                                    <strong>CLICK TO CHANGE COVER PHOTO</strong>
                                </h1>                   
                                <form action="{{ route('institute.dashboard.profile.cover') }}" method="POST" id="cover_photo_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control" style="display: none;" name="cover" id="cover" x-on:change="uploadCover()" accept="image/*">
                                </form>             
                            </div>
                        </div>
                        <form action="{{ route('institute.dashboard.profile.update') }}" method="POST" id="profile_update_form">
                        @csrf
                        <div class="mb-5 row">                            
                                <div class="col-md-3">
                                <label class="h4">
                                    <strong>Name</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        The name of the institute
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="{{ $institute->name }}" placeholder="{{ $institute->name }}" @change="clicked">                                    
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>City</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        The city of the institute
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <select id="underline_select" name="city" class="form-control" @change="clicked">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ $institute->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Locality</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        The locality of the institute
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <select id="underline_select" name="locality" class="form-control" @change="clicked">
                                    @foreach ($localities as $locality)
                                        <option value="{{ $locality->id }}" {{ $institute->locality_id == $locality->id ? 'selected' : '' }}>{{ $locality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Address</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        The address of the institute
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" placeholder="{{ $institute->address }}" @change="clicked" rows="4" style="resize: none;">{{ $institute->address }}</textarea>
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
