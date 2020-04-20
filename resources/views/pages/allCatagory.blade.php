@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>All Catagory Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  </br>
  <div class="jumbotron">
  <a href="{{url('addCatagory')}}" class="btn btn-danger">Add Catagory</a>
   <br>
   </br>
  <table>
   
   <tr>
     <th>SL</th>
     <th>Name</th>
     <th>Tag</th>
     <th>Created at</th>
     <th>Updated at</th>
     <th >Action</th>
    
   </tr>
   @foreach($out as $out)
   <tr>
     <td>{{ $out->id}}</td>
     <td>{{ $out->name}}</td>
     <td>{{ $out->tag}}</td>
     <td>{{ $out->created_at}}</td>
     <td>{{ $out->updated_at}}</td>
     <td><a href="{{ url('editCatagory'.$out->id) }}" class="btn btn-warning">Edit</a> </td>
     <td><a href="{{ url('viewCatagory'.$out->id) }}" class="btn btn-info">View</a> </td>
     <td><a href="{{ url('deleteCatagory'.$out->id) }}" class="btn btn-danger">Delete</a> </td>
   </tr>
    @endforeach
  </table>
  </div>
@endsection