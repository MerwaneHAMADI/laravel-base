<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Permission;
use App\Role;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.user.create');

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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();
        if ($request->role == 'user') {
            $user_permission = Permission::where('slug', 'create-tasks')->first();

            $user_role = new Role();
            $user_role->slug = 'user';
            $user_role->name = 'User';
            $user_role->save();
            $user_role->permissions()->attach($user_permission);

            $user_role = Role::where('slug', 'user')->first();

            $createTasks = new Permission();
            $createTasks->slug = 'create-tasks';
            $createTasks->name = 'Create Tasks';
            $createTasks->save();
            $createTasks->roles()->attach($user_role);

            $user_role = Role::where('slug', 'user')->first();
            $user_perm = Permission::where('slug', 'create-tasks')->first();

            $user->roles()->attach($user_role);
            $user->permissions()->attach($user_perm);
        }
        elseif ($request->role == 'admin') {
            $admin_permission = Permission::where('slug', 'edit-users')->first();

            $admin_role = new Role();
            $admin_role->slug = 'admin';
            $admin_role->name = 'Admin';
            $admin_role->save();
            $admin_role->permissions()->attach($admin_permission);

            $admin_role = Role::where('slug', 'admin')->first();

            $editUsers = new Permission();
            $editUsers->slug = 'edit-users';
            $editUsers->name = 'Edit Users';
            $editUsers->save();
            $editUsers->roles()->attach($admin_role);

            $admin_role = Role::where('slug', 'admin')->first();
            $admin_perm = Permission::where('slug', 'edit-users')->first();

            $user->roles()->attach($admin_role);
            $user->permissions()->attach($admin_perm);
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $test = "hello world";
        return view('dashboard.show', compact('test'));
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
        $user = User::where('id', $id)->first();
        return view('dashboard.user.update', compact('user'));
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
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else {

            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect()->route('user.index');
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
        $user = User::find($id);
        foreach ($user->roles as $key => $role) {
            # code..
            $role->delete();
        }
        $user->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the user!');
        return Redirect()->route('user.index');
    }
}
