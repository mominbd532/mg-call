<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('home');
    }

    public function adminHome()
    {
        $users = User::where('is_admin',null)->get();
        return view('adminHome',compact('users'));
    }

    public function addUser()
    {
        return view('user/add');
    }

    public function saveUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ]);

        $input =$request->all();

        $input['password'] = bcrypt($input['password']);

        User::create($input);

        return back()->with('success', 'User created successfully.');
    }

    public function activeUser($id)
    {
        User::where('id',$id)->update(['status'=>1]);
        return back()->with('success', 'User activated successfully.');
    }

    public function deactiveUser($id)
    {
        User::where('id',$id)->update(['status'=>0]);
        return back()->with('success', 'User deactivated successfully.');
    }

}
