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
                    <h5>Employee Id: <strong>{{ $employee->employee_id }}</strong></h5>
                    <h5>Name Prefix: <strong>{{ $employee->name_prefix }}</strong></h5>
                    <h5>First name: <strong>{{ $employee->first_name }}</strong></h5>
                    <h5>Middle Name: <strong>{{ $employee->middle_name }}</strong></h5>
                    <h5>Last name: <strong>{{ $employee->last_name }}</strong></h5>
                    <h5>Genre: <strong>{{ $employee->gender }}</strong></h5>
                    <h5>Email: <strong>{{ $employee->email }}</strong></h5>
                    <h5>Father Name: <strong>{{ $employee->father_name }}</strong></h5>
                    <h5>Mother Name: <strong>{{ $employee->mother_name }}</strong></h5>
                    <h5>Mother Maiden Name: <strong>{{ $employee->mother_maiden_name }}</strong></h5>
                    <h5>Date Of Birth: <strong>{{ $employee->date_of_birth }}</strong></h5>
                    <h5>Date Of Joining: <strong>{{ $employee->date_of_joining }}</strong></h5>
                    <h5>Salary: <strong>{{ $employee->salary }}</strong></h5>
                    <h5>SSN: <strong>{{ $employee->ssn }}</strong></h5>
                    <h5>Phone: <strong>{{ $employee->phone }}</strong></h5>
                    <h5>City: <strong>{{ $employee->city }}</strong></h5>
                    <h5>State: <strong>{{ $employee->state }}</strong></h5>
                    <h5>Zip: <strong>{{ $employee->zip }}</strong></h5>
                    <br>
                    <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
