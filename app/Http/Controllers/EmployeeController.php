<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('last_name','ASC')->paginate(10);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employee.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'name_prefix' => ['string', 'max:191'],
            'first_name' => ['string', 'max:191', 'required'],
            'last_name' => ['string', 'max:191', 'required'],
            'gender' => ['string', 'max:191', 'required'],
            'email' => ['string', 'max:191', 'unique:employees', 'required'],
            'father_name' => ['string', 'max:191', 'required'],
            'salary' => ['integer', 'required'],
            'phone_no' => ['string ', 'max:191', 'required'],
            'city' => ['string', 'max:191', 'required '],
            'state' => ['string', 'max:191', 'required '],
            'zip' => ['integer', 'required'],
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator);
        }
        else {
            $employee = Employee::create([
              'emp_id' => 'admin',
              'name_prefix' => 'Admin',
              'first_name' => 'Admin',
              'middle_name' => 'Admin',
              'last_name' => 'Admin',
              'gender' => 'Admin',
              'email' => 'Admin',
              'father_name' => 'Admin',
              'mother_name' => 'Admin',
              'mother_maiden_name' => 'Admin',
              'date_of_birth' => 'Admin',
              'salary' => 'Admin',
              'ssn' => 'Admin',
              'phone_no' => 'Admin',
              'city' => 'Admin',
              'state' => 'Admin',
              'zip' => 'Admin',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('employee.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $employee = Employee::where('id', $id)->first();
        return view('admin.employee.view', compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::where('id', $id)->first();
        return view('admin.employee.update', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'emp_id' => ['integer', 'required'],
            'name_prefix' => ['string', 'max:191'],
            'first_name' => ['string', 'max:191', 'required'],
            'last_name' => ['string', 'max:191', 'required'],
            'gender' => ['string', 'max:191', 'required'],
            'email' => ['string', 'max:191', 'required'],
            'father_name' => ['string', 'max:191', 'required'],
            'salary' => ['integer', 'required'],
            'phone_no' => ['string ', 'max:191', 'required'],
            'city' => ['string', 'max:191', 'required '],
            'state' => ['string', 'max:191', 'required '],
            'zip' => ['integer', 'required'],
        );
        $validator = Validator::make($request->all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator);
        }
        else {
            $employee = Employee::where('id', $id)->first();
            $employee->emp_id = $request->emp_id;
            $employee->name_prefix = $request->name_prefix;
            $employee->first_name = $request->first_name;
            $employee->middle_name = $request->middle_name;
            $employee->last_name = $request->last_name;
            $employee->gender = $request->gender;
            $employee->email = $request->email;
            $employee->father_name = $request->father_name;
            $employee->mother_name = $request->mother_name;
            $employee->mother_maiden_name = $request->mother_maiden_name;
            $employee->date_of_birth = $request->date_of_birth;
            $employee->date_of_joining = $request->date_of_joining;
            $employee->salary = $request->salary;
            $employee->ssn = $request->name_prefix;
            $employee->phone_no = $request->phone_no;
            $employee->city = $request->city;
            $employee->state = $request->state;
            $employee->zip = $request->zip;
            $employee->created_at = Carbon::now();
            $employee->updated_at = Carbon::now();
            $employee->save();
            return redirect()->route('employee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the emo$employee!');
        return Redirect()->route('employee.index');
    }
}
