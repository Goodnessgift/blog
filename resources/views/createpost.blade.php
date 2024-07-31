@extends('layout.app')
@section('content')
    <!-- Page header with logo and tagline-->
    <section class="py-5 bg-light border-bottom mb-4"style="background: linear-gradient(to right, #f8f9fa, #e9ecef); border-bottom: 2px solid #ddd; margin-bottom: 2rem; padding: 5rem 0;">
        <div class="container" style="max-width: 900px; margin: 0 auto; text-align: center;">
            <div class="text-center my-5">
                <h1 class="fw-bolder"style="font-size: 3rem; color: #343a40; font-family: 'Roboto', sans-serif; margin-bottom: 1rem;">Create Your Blog!</h1>
                <p class="lead mb-0" style="font-size: 1.25rem; color: #6c757d;">The home of bloggers.</p>
            </div>
        </div>
    </section>

    <main>
        <div class="d-flex justify-content-center align-items-center">

            <form action="/postblog" method="POST" class="m-3 w-50" enctype="multipart/form-data"
                style="border:1px solid #ccc; border-radius:25px; padding: 5em; background:rgb(244, 244, 244); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                @csrf

                <div class="form-group mb-3">
                    <label for="blog_title"  style="font-weight: bold; margin-bottom: .5em; display: block;">Blog Title:</label>
                    <input type="text" name="blog_title" class="form-control" placeholder="Enter blog title" style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div class=" d-inline-block">
                    @if ($errors->has('blog_title'))
                        <div class="alert alert-danger">{{ $errors->first('blog_title') }}</div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="blog_details"  style="font-weight: bold; margin-bottom: .5em; display: block;">Blog Details:</label>
                    <textarea type="text" name="blog_details" class="form-control" placeholder="Enter blog details"style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                </div>
                <div class=" d-inline-block">
                    @if ($errors->has('blog_details'))
                        <div class="alert alert-danger">{{ $errors->first('blog_details') }}</div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="blog_image"  style="font-weight: bold; margin-bottom: .5em; display: block;">Blog Image:</label>
                    <input type="file" accept="*" name="blog_image" class="form-control"style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px; background-color: #f8f9fa; color: #495057; font-family: 'Roboto', sans-serif; font-size: 1rem; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                </div>
                <div class=" d-inline-block">
                    @if ($errors->has('blog_image'))
                        <div class="alert alert-danger">{{ $errors->first('blog_image') }}</div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="blog_tags"  style="font-weight: bold; margin-bottom: .5em; display: block;">Blog Tag:</label>
                    <input type="text" name="blog_tags" class="form-control" placeholder="Enter blog tag" style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div class=" d-inline-block">
                    @if ($errors->has('blog_tags'))
                        <div class="alert alert-danger">{{ $errors->first('blog_tags') }}</div>
                    @endif
                </div>

                <div class="text-center"><button class="btn btn-primary"  style="border: none; padding: .75em 2em; border-radius: 25px; color: #fff; font-size: 1em; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: background-color 0.3s, transform 0.3s;">Submit</button></div>

            </form>
        </div>
    </main>
    </section>
@endsection
