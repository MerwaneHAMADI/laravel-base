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

                    <form  action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>

                        <input class="form-control" type="text" name="name" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
                        <input class="form-control" type="text" name="email" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Role</label>
                        <select class="form-control" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
                        <input class="form-control" type="password" name="password" >
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
