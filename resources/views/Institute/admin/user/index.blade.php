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
            <form action="{{ route('institute.dashboard.user.update') }}" method="POST" id="profile_update_form">
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
                                <ul class="list-group alert alert-danger" style="background: transparent !important;">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item" style="background: transparent !important;">{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>                            
                    </div>
                @endif                     
                    <div class="card-body">
                        <h5 class="mb-3 card-title">PROFILE</h5>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Name</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        Your full name
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="{{ auth()->user()->name }}" @change="clicked">                                    
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Email</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        Your email address
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="{{ auth()->user()->email }}" @change="clicked">                                    
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Phone</strong>
                                </label>
                                <p class="-mt-1 text-muted">
                                    <small>
                                        Your phone number
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="phone" value="{{ auth()->user()->phone }}" placeholder="{{ auth()->user()->phone }}" @change="clicked">                                    
                            </div>
                        </div>                    
                    </div>        
                    <div class="card-body">
                        <h5 class="mb-3 card-title">PASSWORD</h5>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Current password</strong>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="********" @change="clicked" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>New password</strong>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="new_password" placeholder="********" @change="clicked" autocomplete="new-password">                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="h4">
                                    <strong>Confirm new password</strong>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="new_password_confirmation" placeholder="********" @change="clicked" autocomplete="new-password">                                    
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
