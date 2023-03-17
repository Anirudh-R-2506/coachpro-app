@extends('institute.layouts.admin')

@section('css')

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.0/dist/browser-image-compression.js"></script>
<script src="{{asset('js/jquery.lbt-lightbox.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery.lbt-lightbox.min.css')}}">
<script defer>
    function createPhoto(id)
    {
        document.getElementById(`${id}`).submit();
    }    

    function trigger_delete(id) {
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
                document.getElementById('delete_image_' + id).submit();                
            }
        });
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
                    Photos
                    <br>
                    <small style="font-size: 0.9rem; font-weight: 300;">
                        Photo gallery of the institute
                    </small>
                </h1>                
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary" style="float: right !important; max-height: 3rem;">
                <i class="fa-solid fa-plus"></i> &nbsp; Add new photo
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
                            Add new photo
                            <br>
                            <small style="font-size: 0.9rem; font-weight: 300;">
                                Add a new photo to the gallery
                            </small>
                        </h3>           
                    </div>
                    <div class="m-3 modal-body">

                        <form action="{{ route('institute.dashboard.photos.store') }}" id="new_photo_form" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-5 row">
                                <div class="col-md-3">
                                    <label class="h4">
                                        <strong>Photos</strong>
                                    </label>
                                    <p class="-mt-1 text-muted">
                                        <small>
                                            The photos to be added
                                        </small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <input @blur="blur" multiple required @input="input" type="file" class="form-control" id="image" name="image[]" accept="image/jpeg,image/png,image/jpg" data-max-file-size="3MB"
                                    data-max-files="10">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <span onclick="createPhoto('new_photo_form')">
                                    <x-loadingbutton type="button">Create</x-loadingbutton>
                                </span>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        </div>        
        <div class="p-2 mt-3 card mild-border" style="border-radius: 1.5rem;">
            <div class="card-body">
                @if($images->count() != 0)
                    <div id="gallery" class="row">
                        @foreach ($images as $image)
                            <div class="mb-2 col-md-4 item">
                                <img width="100%" height="300" src="{{ $image->getTemporaryUrl(now()->addMinutes(100)); }}" alt="image" />
                                <div class="caption">
                                    <div class="mt-2">
                                        <center><button class="btn btn-danger" type="button" onclick="trigger_delete({{$image->id}});">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button></center>
                                        <form action="{{ route('institute.dashboard.photos.delete', $image->id) }}" id="delete_image_{{$image->id}}" method="POST">@csrf @method('DELETE')</form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        <strong>Attention</strong>
                        <div>
                            <p>Looks like you don't have any photos in your gallery :(</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>

    const options = {
        maxSizeMB: 1,
        maxWidthOrHeight: 300,
        alwaysKeepResolution: true,
        useWebWorker: true
    }
    
    $(document).ready(function() {

        $('#gallery').lbtLightBox({
            custom_children:".item img",
            captions:true,
            captions_selector:".item div",
            qtd_pagination: 9,
            pagination_width: "60px",
            pagination_height: "60px",
        });


        $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
        $.fn.filepond.registerPlugin(FilePondPluginImageTransform);
        FilePond.setOptions({
            name: 'image',
            required: true,
            server: {
                url: "{{ route('institute.dashboard.photos.upload') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            imageTransformAfterCreateBlob: (blob) =>
                new Promise(async (resolve) => {
                    try{
                        const compressedFile = await imageCompression(blob, options);
                        resolve(compressedFile);
                    }catch(e){
                        console.log(e);
                        resolve(blob);
                    }
            }),
        });
        let file = FilePond.create(
            document.querySelector('#image')            
        );
        $.fn.filepond.setDefaults({
            acceptedFileTypes: ['image/*'],
        });
    });
</script>
@endsection
