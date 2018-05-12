<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $programs = Program::with('user')->get();
        return view('program.index', compact('programs'));
    }

    public function create()
    {
      return view('program.create');
    }
}
