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

                    @if (Auth::user()->hasRole('admin'))
                     <a class="btn btn-primary" href="{{route('employee.create')}}">Add Employee</a>
                    @endif
                     <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        @if (Auth::user()->hasRole('admin'))
                          <th></th>
                          <th></th>
                        @endif
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
                        width: 100%;" href="{{route('employee_path',$employee->id)}}">{{$employee->last_name}}</a></td>
                      @if (Auth::user()->hasRole('admin'))

                        <td><a href="{{route('employee.edit',$employee->id)}}">Edit Employee</a></td>
                        <td>
                          <form action="{{route('employee.destroy',$employee->id)}}" method="post" onClick="return(confirm('Are you Sure to delete this employee?'));">
                                    @csrf
                                    @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="delete"/>
                          </form>
                        </td>
                            </tr>
                      @endif

                    @endforeach
                </table>
                </div>
                    {!! $employees->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
