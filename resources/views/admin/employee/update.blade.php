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

                    <form  action="{{route('employee.update',$employee->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input class="form-control" type="hidden" name="emp_id" value="{{$employee->emp_id}}" required>
                       <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name Prefix</label>
                        <input class="form-control" type="text" name="name_prefix" value="{{$employee->name_prefix}}" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">First Name</label>
                        <input class="form-control" type="text" name="first_name" value="{{$employee->first_name}}" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Middle Name</label>
                        <input class="form-control" type="text" name="middle_name" value="{{$employee->middle_name}}">
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
                        <input class="form-control" type="text" name="last_name" value="{{$employee->last_name}}" required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="male" @if($employee->gender == 'male') selected @endif>Male</option>
                            <option value="female" @if($employee->gender == 'female') selected @endif>Female</option>
                            <option value="other" @if($employee->gender == 'other') selected @endif>Other</option>
                        </select>
                          </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
                        <input class="form-control" type="email" name="email" value="{{$employee->email}}" required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Father Name</label>
                        <input class="form-control" type="text" name="father_name" value="{{$employee->father_name}}" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mother Name</label>
                        <input class="form-control" type="text" name="mother_name" value="{{$employee->mother_name}}">
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mother Maiden Name</label>
                        <input class="form-control" type="text" name="mother_median_name" value="{{$employee->mother_median_name}}">
                      </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of birth</label>
                        <input class="form-control" type="date" name="date_of_birth" value="{{$employee->date_of_birth}}">
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of joining</label>
                        <input class="form-control" type="date" name="date_of_joining" value="{{$employee->date_of_joining}}">
                     </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Salary</label>
                        <input class="form-control" type="int" name="salary" value="{{$employee->salary}}"required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">SSN</label>
                        <input class="form-control" type="text" name="ssn" value="{{$employee->ssn}}">
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone No</label>
                        <input class="form-control" type="text" name="phone_no" value="{{$employee->phone_no}}" required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">City</label>
                        <input class="form-control" type="text" name="city" value="{{$employee->city}}" required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">State</label>
                        <input class="form-control" type="text" name="state" value="{{$employee->state}}" required>
                         </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Zip</label>
                        <input class="form-control" type="int" name="zip" value="{{$employee->zip}}" required>
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
