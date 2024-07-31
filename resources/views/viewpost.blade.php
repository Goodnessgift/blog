@extends('layout.app')
@section('content')
    <section class="py-5 bg-light border-bottom mb-4" style="padding:1em;">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">{{ $post->blog_title }}</h1>
            </div>
        </div>
    </section>


    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <img class="img-fluid rounded mx-auto d-block my-4" src="{{ asset('uploads/' . $post->blog_image) }}"
                alt="..." style="max-height: 500px; object-fit: cover;">
            <p class="lead mb-3">{{ $post->blog_details }}</p>
        </div>
    </div>
@endsection
