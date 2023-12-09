@extends('layouts.master')
@section('content')
<!-- Hero Section -->
<section class="hero-section bg--title shapes-container">
   <div class="container">
      <h1 class="hero-title">Blog</h1>
   </div>
</section>
<!-- Hero Section -->
<!-- Blog Section -->
<section class="blog-section pt-120 pb-120">
   <div class="container">
      <div class="row g-4 justify-content-center">
         
         @foreach($blogs as $blog)
        
         <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="post__item">
               <div class="post__thumb">
                  <a href="{{ url('/blog/' . $blog->id . '/view') }}">
                  <img src="{{asset('blog_images')}}/{{$blog->image}}" style="height: 200px;" alt="blog {{$blog->title}}">
                  </a>
                  <div class="post__date">
                     <h4 class="date">{{ \Carbon\Carbon::parse($blog->publish_date)->format('d') }}</h4>
                     <span>{{ \Carbon\Carbon::parse($blog->publish_date)->format('M') }}</span>
                  </div>
               </div>
               <div class="post__content">
                  <div class="overflow-hidden">
                     <div class="post__meta">
                        <a class="item">
                        <i class="las la-user"></i>
                        <span>Admin</span>
                        </a>
                     </div>
                  </div>
                  <h5 class="post__title">
                     <a href="{{ url('/blog/' . $blog->id . '/view') }}">{{$blog->title}}</a>
                  </h5>
                  <a href="{{ url('/blog/' . $blog->id . '/view') }}" class="text--base">Read More <i class="las la-long-arrow-alt-right"></i></a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
<!-- Blog Section -->
@endsection