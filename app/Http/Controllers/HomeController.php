<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $employees = Employee::orderBy('last_name','ASC')->paginate(10);
        return view('home',compact('employees'));
    }

    public function adminIndex()
    {
        return view('admin-home');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back();
    }
    public function single_employee($id){

         $employee = Employee::where('id', $id)->first();
        return view('admin.employee.view', compact('employee'));
    }
    public function viewemployee(){
          $employees = Employee::orderBy('last_name','ASC')->paginate(10);
        return view('user.employee.index', compact('employees'));
    }
}
