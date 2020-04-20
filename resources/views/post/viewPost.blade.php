@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>View Post Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
    <div>
  </div>
  </header>
  <h1>{{ $view->name }}</h1>
      <img src="{{ URL::to($view->image) }}">
      <p>Post: {{ $view->post }}</p>
      