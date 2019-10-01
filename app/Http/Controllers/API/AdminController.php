<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function __construct()
    {
        // $this->middleware('auth:admin', ['only' => 'index', 'edit']);
    }

    public function index(Request $request)
    {
        // if ($request->user()->hasRole('admin')) {
        //     return view('layouts.master');
        // }

        // if (request()->user()->hasRole('user')) {
        //     return view('landing');
        // }
        // return view('layouts.master');
    }

    public function create()
    {
        // return view('layouts.auth.register');
    }

    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required|min:8|max:15'
        ]);
        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = bcrypt($request->password);
        $admins->save();
        // return redirect()->route('layouts.auth.login');
    }
}
