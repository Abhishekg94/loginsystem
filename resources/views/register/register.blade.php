
@extends('layout')

@section('content')
  
<!-- @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{ $error }} </br>
        @endforeach
    </div>
@endif -->

  <h2>Vertical (basic) form</h2>
  @if(Session::has('success'))
      <div class="row">
          <div class="col-md-12">
              <div class="alert alert-success">
                  {{Session::get('success')}}
              </div>
          </div>
      </div>
  @endif
  <form action="register_action" method="post">
      @csrf

  <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name">
      <!-- @if($errors->has('name')) <p>{{$errors->first('name')}}</p> @endif -->
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <!-- @if($errors->has('email')) <p>{{$errors->first('email')}}</p> @endif -->
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      <!-- @if($errors->has('password')) <p>{{$errors->first('password')}}</p> @endif -->
    </div>

    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Confirm  password" name="cpassword">
      <!-- @if($errors->has('cpassword')) <p>{{$errors->first('cpassword')}}</p> @endif -->
    </div>

    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection



