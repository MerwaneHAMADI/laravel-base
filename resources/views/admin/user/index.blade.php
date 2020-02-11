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
                    <a href="{{route('user.create')}}">Add User</a>
                   <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @if(isset($users))
                    @foreach($users as $user)
                         <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->name}}
                                @endforeach
                                </td>
                            <td><a href="{{route('user.edit',$user->id)}}">Edit User</a></td>
                            <td><form action="{{route('user.destroy',$user->id)}}" method="post" onClick="return(confirm('Are you Sure to delete this user'));">

                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete"/>
                            </form></td>
                        </tr>

                    @endforeach
                    @endif
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
