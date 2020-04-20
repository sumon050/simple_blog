@extends('welcome')
@section('head')
     <header class="masthead" style="background-image: url('frontend/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>All Student Page</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  </br>
  <div class="jumbotron">
  <a href="{{ url('student/create') }}" class="btn btn-danger">Add Student</a>
   <br>
   </br>
  <table>
   
   <tr>
     <th>SL</th>
     <th>Student Name</th>
     <th>Student Email</th>
     <th>Phone</th>
     <th >Action</th>
    
   </tr>
   @foreach($student as $out)
   <tr>
     <td>{{ $out->id}}</td>
     <td>{{ $out->name}}</td>
     <td>{{ $out->email}}</td>
     <td>{{ $out->phone}}</td>
     <td><a href="{{url('student/'.$out->id.'/edit') }}" class="btn btn-warning">Edit</a> </td>
     <td>
     <form  class="form-group" action="{{ url('student/'.$out->id) }}" method="post">
      @csrf
      @method("DELETE")
       <button class="btn btn-danger" type="submit">Delete</button>
     </form>
   </td>
   <td>
     <form  class="form-group" action="{{ url('student/'.$out->id) }}" method="get">
      @csrf
      @method('HEAD')
       <button class="btn btn-primary" type="submit">View</button>
     </form>
     </td>
   </tr>
    @endforeach
  </table>
  </div>
@endsection