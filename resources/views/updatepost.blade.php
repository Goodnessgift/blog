@extends('layout.app')
@section('content')



<section class="py-5 bg-light border-bottom mb-4" style="padding:1em;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"style="font-size: 3em; font-family: 'Roboto', sans-serif;  margin-bottom: 0.5em;">Update Post!</h1>
            <p class="lead mb-0"style="font-size: 1.3em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-bottom: 0.5em;">Change post to your heart's content.</p>
        </div>
    </div>
</section>
<main>
    <div class="d-flex justify-content-center align-items-center">

        <form action="/updatepost" method="POST" class="m-3 w-50" enctype="multipart/form-data"
            style="border:1px solid #ccc; border-radius:25px; padding: 5em; background:rgb(244, 244, 244); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            @csrf

            <div class="form-group mb-3">
                <label for="blog_title">Blog Title:</label>
                <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}">
            </div>
            <div class=" d-inline-block">
                @if ($errors->has('blog_title'))
                    <div class="alert alert-danger">{{ $errors->first('blog_title') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="blog_details">Blog Details:</label>
                <textarea type="text" name="blog_details" class="form-control" >{{ $blog->blog_details }}</textarea>
            </div>
            <div class=" d-inline-block">
                @if ($errors->has('blog_details'))
                    <div class="alert alert-danger">{{ $errors->first('blog_details') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="blog_image">Blog Image:</label>
                <input type="file" accept="*" name="blog_image" class="form-control" value="{{ $blog->blog_image }}">
            </div>
            <div class=" d-inline-block">
                @if ($errors->has('blog_image'))
                    <div class="alert alert-danger">{{ $errors->first('blog_image') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="blog_tags">Blog Tag:</label>
                <input type="text" name="blog_tags" class="form-control" value="{{ $blog->blog_tags }}">
            </div>
            <div class=" d-inline-block">
                @if ($errors->has('blog_tags'))
                    <div class="alert alert-danger">{{ $errors->first('blog_tags') }}</div>
                @endif
            </div>

            <div class="text-center"><button class="btn btn-primary">Submit</button></div>

            <input type="hidden" name="id" value="{{ $blog->id }}">

        </form>
    </div>
</main>
@endsection