@extends('layouts.default')


@section('content')

    @include('includes.page-banner', [
        'title' => 'Contact Us',
        'subtitle' => 'Get in touch with us'
    ])
    
    @include('includes.contact-form')

@endsection