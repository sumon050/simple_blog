@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Catagory View Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div>
    <ol>
      <li>Student Name: {{ $student->name }}</li>
      <li>Student Email: {{ $student->email}}</li>
      <li>Student Phone: {{ $student->phone }}</li>
    </ol>
  </div>
@endsection