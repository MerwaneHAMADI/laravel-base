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
                    @if(Auth::user()->hasRole('admin') && Auth::check())
                        Welcome {{Auth::user()->roles[0]->name}}
                    @elseif(Auth::user()->hasRole('user') && Auth::check())
                        Welcome {{Auth::user()->roles[0]->name}}
                    @endif
                    <p>All Employee</p>
<table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    @foreach($employees as $employee)
                         <tr>
         <td><a style="display: block;
                            text-decoration: none;
                        height: 100%;
                        width: 100%;" href="{{route('employee_path',$employee->id)}}">{{$employee->first_name}}</a></td>

                    <td><a style="display: block;
                    text-decoration: none;
                        height: 100%;
                        width: 100%;" href="{{route('employee.view',$employee->id)}}">{{$employee->last_name}}</a></td>
                        </tr>

                    @endforeach
                </table>
                 {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
