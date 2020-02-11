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

                        <input class="form-control" type="text" name="name_prefix" required>
                         </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">First Name</label>
                        <input class="form-control" type="text" name="first_name" required>
                       </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Middle Name</label>
                        <input class="form-control" type="text" name="middle_name" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>

                        <input class="form-control" type="text" name="last_name" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Gender</label>

                        <select class="form-control" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
                        <input class="form-control" type="email" name="email" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Father Name</label>
                        <input class="form-control" type="text" name="father_name" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mother Name</label>
                        <input class="form-control" type="text" name="mother_name" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mother Maiden Name</label>
                        <input class="form-control" type="text" name="mother_median_name" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of birth</label>
                        <input class="form-control" type="date" name="date_of_birth" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of joining</label>
                        <input class="form-control" type="date" name="date_of_joining" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Salary</label>
                        <input class="form-control" type="int" name="salary" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">SSN</label>
                        <input class="form-control" type="text" name="ssn" >
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone No</label>
                        <input class="form-control" type="text" name="phone_no" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">City</label>
                        <input class="form-control" type="text" name="city" required>
                        </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">State</label>
                        <input class="form-control" type="text" name="state" required>
                        </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Zip</label>
                        <input class="form-control" type="int" name="zip" required>
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
