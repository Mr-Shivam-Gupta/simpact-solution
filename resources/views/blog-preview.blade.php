@extends('layouts.master')
@section('content')
<section class="hero-section bg--title shapes-container">
   <div class="container">
      <h1 class="hero-title">Details</h1>
   </div>
</section>
<!-- Blog Single -->
<section class="blog-section bg--section pt-120 pb-120">
   <div class="container">
      <div class="row gy-5 justify-content-center">
         <div class="col-lg-8">
            <div class="post__details mb-5">
               <div class="post__thumb">
                  <img src="{{asset('blog_images')}}/{{$blogs->image}}" alt="blog {{$blogs->title}}">
               </div>
               <div class="post__header">
                  <h3 class="post__title">
                  {{$blogs->title}}
                  </h3>
               </div>
                <div class="">
                {!! $blogs->description !!}
                </div>
               <div class="row gy-4 justify-content-between">
                  <div class="col-md-6">
                     <h6 class="post__share__title">Share now</h6>
                     <ul class="post__share">
                        <li>
                           <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmlmcreatorsindia.com%2F" target="_blank">
                           <i class="fab fa-facebook-f"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://twitter.com/intent/tweet?text=Your%20share%20text&amp;url=https%3A%2F%2Fmlmcreatorsindia.com%2F" target="_blank">
                           <i class="fab fa-twitter"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://plus.google.com/share?url=https%3A%2F%2Fmlmcreatorsindia.com%2F" target="_blank">
                           <i class="fab fa-google"></i>
                           </a>
                        </li>
                        <li>
                           <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fmlmcreatorsindia.com%2F&amp;title=Your%20share%20text&amp;summary=Your%20LinkedIn%20summary" target="_blank">
                           <i class="fab fa-linkedin"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="mb-5">
               <div class="comments-area">
                  <div class="fb-comments" data-width="100%" data-numposts="5"></div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <aside class="blog-sidebar bg--body">
               <div class="widget widget__post__area">
                  <h5 class="widget__title">Recent Blog</h5>
                  <ul>
                  @foreach($last_blogs as $last_blog)
                     <li>
                        <a href="{{ url('/blog/' . $last_blog->id . '/view') }}" class="widget__post">
                           <div class="widget__post__thumb">
                              <img src="{{asset('blog_images')}}/{{$last_blog->image}}" alt="blog">
                           </div>
                           <div class="widget__post__content">
                              <h6 class="widget__post__title">
                              {{$last_blog->title}}
                              </h6>
                              <span>{{ \Carbon\Carbon::parse($last_blog->publish_date)->format('d-M-Y') }}</span>
                           </div>
                        </a>
                    </li>
                    @endforeach
                  </ul>
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<!-- Blog Single -->
@endsection