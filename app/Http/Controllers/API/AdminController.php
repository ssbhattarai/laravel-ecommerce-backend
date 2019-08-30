<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return view('layouts.master');
        }

        if (request()->user()->hasRole('user')) {
            return view('landing');
        }
    }
}
