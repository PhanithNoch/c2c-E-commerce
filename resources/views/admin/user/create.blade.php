@extends('admin.master')

@section('title','add users')
@section('col-size','col-md-8')
@section('box-title','Create Users')
@section('content')

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <form role="form" action="{{url('system/users/create')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                      <option>Admin</option>
                      <option>Report</option>
                 
                    </select>
                  </div>
             
                <div class="form-group">
                  <label>Name</label>
                <input name="name" type="text" value="{{old('name')}}" class="form-control" placeholder="Enter ...">
                </div>
              
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter ...">
                  </div>

                  <div class="form-group">
                    <label>Phone</label>
                  <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label>Profile</label>
                    <input type="file" name="profile" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter ...">
                  </div>

                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password"  class="form-control" placeholder="Enter ...">
                  </div>
            
        
                  <div class="form-group">
                    <input class="btn btn-success pull-right" type="submit">
                  </div>
              </form>
  
@endsection