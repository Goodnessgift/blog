@extends('layout.app')
@section('content')
    <!-- Page header with logo and tagline-->
    <section
        class="py-5 bg-light border-bottom mb-4"style="background: linear-gradient(to right, #f8f9fa, #e9ecef); border-bottom: 2px solid #ddd; margin-bottom: 2rem; padding: 5rem 0;">
        <div class="container" style="max-width: 900px; margin: 0 auto; text-align: center;">
            <div class="text-center my-5">
                <h1
                    class="fw-bolder"style="font-size: 3rem; color: #343a40; font-family: 'Roboto', sans-serif; margin-bottom: 1rem;">
                    Sign in!</h1>
                <p class="lead mb-0" style="font-size: 1.25rem; color: #6c757d;">The home of bloggers.</p>
            </div>
        </div>
    </section>

    <main>
        <div class="d-flex justify-content-center align-items-center">

            <form action="/login" method="POST" class="m-3 w-50" enctype="multipart/form-data"
                style="border:1px solid #ccc; border-radius:25px; padding: 5em; background:rgb(244, 244, 244); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                @csrf
                <div class="form-group mb-3">
                    <label for="Email" style="font-weight: bold; margin-bottom: .5em; display: block;">Email:</label>
                    <input type="Email" name="email" class="form-control" placeholder="Enter your Email"
                        style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px; background-color: #f8f9fa; color: #495057; font-family: 'Roboto', sans-serif; font-size: 1rem; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                </div>

                <div class="form-group mb-3">
                    <label for="password" style="font-weight: bold; margin-bottom: .5em; display: block;">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"
                        style="width: 100%; padding: .75em; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div class="text-center"><button class="btn btn-primary"
                        style="border: none; padding: .75em 2em; border-radius: 25px; color: #fff; font-size: 1em; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: background-color 0.3s, transform 0.3s;">Submit</button>
                </div>

            </form>
        </div>
    </main>
    </section>
@endsection
