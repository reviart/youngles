<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function price()
    {
      return view('public.price');
    }

    public function information()
    {
      return view('public.information');
    }
}
