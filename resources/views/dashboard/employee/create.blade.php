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
                       <form  action="{{route('employee.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name Prefix</label>
                                    <select class="form-control" name="name_prefix">
                                        <option value="Mr.">Mr</option>
                                        <option value="Ms.">Ms</option>
                                        <option value="Mrs.">Mrs</option>
                                        <option value="Dr.">Dr</option>
                                        <option value="Drs.">Drs</option>
                                        <option value="Prof.">Prof</option>
                                        <option value="Hon.">Hon</option>
                                    </select>
                                    @if($errors->has('name_prefix'))
                                      <span class="text-danger">{{ $errors->first('name_prefix') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Employee ID</label>
                                    <input class="form-control" type="text" name="employee_id">
                                    @if($errors->has('employee_id'))
                                      <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="first_name">
                                    @if($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Middle Initial</label>
                                    <input class="form-control" type="text" name="middle_initial" >
                                    @if($errors->has('middle_initial'))
                                        <span class="text-danger">{{ $errors->first('middle_initial') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name">
                                    @if($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email">
                                    @if($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Father Name</label>
                                    <input class="form-control" type="text" name="father_name">
                                    @if($errors->has('father_name'))
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mother Name</label>
                                    <input class="form-control" type="text" name="mother_name" >
                                    @if($errors->has('mother_name'))
                                      <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mother Maiden Name</label>
                                    <input class="form-control" type="text" name="mother_maiden_name" >
                                    @if($errors->has('mother_maiden_name'))
                                      <span class="text-danger">{{ $errors->first('mother_maiden_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of birth</label>
                                    <input class="form-control" type="date" name="date_of_birth" >
                                    @if($errors->has('date_of_birth'))
                                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of joining</label>
                                    <input class="form-control" type="date" name="date_of_joining" >
                                    @if($errors->has('date_of_joining'))
                                      <span class="text-danger">{{ $errors->first('date_of_joining') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Salary</label>
                                    <input class="form-control" type="int" name="salary">
                                    @if($errors->has('salary'))
                                      <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>SSN</label>
                                    <input class="form-control" type="text" name="ssn" >
                                    @if($errors->has('ssn'))
                                       <span class="text-danger">{{ $errors->first('ssn') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone">
                                    @if($errors->has('phone'))
                                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city">
                                    @if($errors->has('city'))
                                      <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state">
                                    @if($errors->has('state'))
                                      <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Zip</label>
                                    <input class="form-control" type="int" name="zip">
                                    @if($errors->has('zip'))
                                        <span class="text-danger">{{ $errors->first('zip') }}</span>
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
