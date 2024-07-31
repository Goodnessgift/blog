@extends('layout.app')
@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
<div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the success message exists
            var successMessage = document.querySelector('.alert-success');
            if (successMessage) {
                // Set a timeout to hide the message and redirect after 3 seconds
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    window.location.href = '{{ route('home') }}';
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>


</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
<div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the success message exists
            var errorMessage = document.querySelector('.alert-danger');
            if (errorMessage) {
                // Set a timeout to hide the message and redirect after 3 seconds
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                    window.location.href = '{{ route('home') }}';
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>


</div>
@endif

<main>
     <!-- Page header with logo and tagline-->

 <section class="py-5 bg-light border-bottom mb-4" style="padding:1em;">
     <div class="container" style="max-width: 900px; margin: 0 auto;">
         <div class="text-center my-5"style="color: #343a40;">
             <h1 class="fw-bolder" style="font-size: 3em;  font-family: 'Roboto', sans-serif; margin-bottom: 0.5em;">Welcome to Blogger's Haven!</h1>
             <p class="lead mb-0" style="font-size: 1.3em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-bottom: 0.5em;">The home of bloggers.</p>
         </div>
     </div>
 </section>

 <main>
     <div class="container">
         <div class="row">
             @foreach ($myposts as $post)
                 <!-- Blog post-->
                 <div class="col-lg-4">
                     <div class="card mb-4" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                         <div style="height:200px; overflow-y:hidden; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                             <a href="#!">
                                <img class="card-img-top"src="{{ asset('uploads/' . $post->blog_image) }}"
                                     alt="..."  style="object-fit: cover; width: 100%; height: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;" /></a>
                         </div>
                         <div class="card-body">
                             <div class="small text-muted" >{{ substr($post->created_at, 0, 10) }} &nbsp;   &#x1F441;&#xFE0F;&#x200D;&#x1F5E8; {{ $post->blog_views}}</div>
                             <h2 class="card-title h4"  style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-top: 0.5em;">{{ $post->blog_title }}</h2>
                             <p class="card-text" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-top: 0.5em;">{{ $post->blog_details }}</p>
                             <a class="btn btn-primary" href="/viewpost/{{ $post->id }}" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-top: 0.25em; border-radius: 8px;"> View post </a>
                             <a class="btn btn-sm btn-outline-dark ms-3" href="/changepost/{{ $post->id }}"
                                style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-top: 0.25em; border-radius: 8px; padding:8px; margin-left:-10px;">Change blog </a>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
     {{-- {{ Auth::user()->name }} --}}
 </main>

</main>
</section>

@endsection