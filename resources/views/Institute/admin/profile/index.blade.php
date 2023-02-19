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
            <form action="{{ route('institute.dashboard.profile.update') }}" method="POST" id="profile_update_form">
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
