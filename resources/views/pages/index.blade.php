@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Home Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
    <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          @foreach($post as $show)
          <a href="{{ url('viewPost'.$show->id) }}">
            <h2 class="post-title">
              {{ $show->title }}
            </h2>
            <img src="{{URL::to($show->image)  }}" style=" height: 100px; width:300px;">
          </a>
          <p class="post-meta">{{ $show->name }}
            <a href="#">{{ $show->tag }}</a>
            {{ $show->created_at }}</p>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <hr>
  {{ $post->links() }}
@endsection