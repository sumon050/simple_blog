@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Create Post Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{url('addCatagory')}}", class="btn btn-danger">Add Catagory</a>
        <a href="{{url('allCatagory')}}", class="btn btn-info">All Catagory</a>
        <a href="{{url('allPost')}}", class="btn btn-success">All Post</a>
          <br>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        <form  action="{{ route('insert_post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" name="title">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagory Name</label>
              <select class="form-control" name="catagory_id">
                @foreach($catagory_id as $id)
                <option value="{{ $id->id }}">{{ $id->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" name="image">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post</label>
              <textarea rows="5" class="form-control" name="post"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Subm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection