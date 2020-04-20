@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>All Post Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <br>
</br>
  <div class="jumbotron">
  <a href="{{ url('allPost') }}" class="btn btn-success"></a>
  <table align="center">
   
   <tr>
     <th>SL</th>
     <th>Caragory ID</th>
     <th>Title</th>
     <th>Image</th>
     <th >Action</th>
    
   </tr>
   @foreach($out as $out)
   <tr>
     <td>{{ $out->id}}</td>
     <td>{{ $out->name}}</td>
     <td>{{ $out->title}}</td>
     <td><img src="{{ URL::to($out->image)}}" style="height: 40px; width: 80px;"></td>
     <td><a href="{{ url('viewPost'.$out->id) }}" class="btn btn-info">View</a> </td>
      <td><a href="{{ url('editPost'.$out->id) }}" class="btn btn-warning">Edit</a> </td>
      <td><a href="{{ url('deletePost'.$out->id) }}" class="btn btn-danger">Delete</a> </td>
   </tr>
    @endforeach
  </table>
  </div>
@endsection