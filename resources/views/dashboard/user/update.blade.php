@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="post" action="{{route('user.update',$user->id)}}" >
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
    <div class="form-group col-md-6">
      <label>Email</label>
                        <input class="form-control" type="texr" name="email" value="{{$user->email}}">
                        @if($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
    <div class="form-group col-md-6">
      <label>Role</label><br>
                        <select class="form-control" name="role">
                            <option value="user" @if($user->role == 'user') selected @endif>user</option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>admin</option>
                        </select>
                        @if($errors->has('role'))
                          <span class="text-danger">{{ $errors->first('role') }}</span>
                        @endif
                      </div>
    <div class="form-group col-md-6">
      <label>Password</label>
                        <input class="form-control" type="password" name="password">
                        @if($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        </div>
                    </div>
                        <input type="submit" style="margin-left: 25%;width:50%;" class="text-center btn btn-primary" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
