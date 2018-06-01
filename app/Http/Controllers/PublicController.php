<?php

namespace App\Http\Controllers;

use App\Information;
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

    public function detailinformation($id)
    {
      $data = Information::with('user')->where('id', $id)->first();
      return view('public.detailinformation', compact('data'));
    }
}
