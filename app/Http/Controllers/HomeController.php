<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$datas = User::all()
        return view('home');
    }

    public function home()
    {
      $datas = User::all();
      return view('profile.home', compact('datas'));
    }

    public function show($id)
    {
      $datas = User::where('id', $id)->first();
      return view('profile.edit', compact('datas'));
    }
}
