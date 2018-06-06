<?php

namespace App\Http\Controllers;

use App\Information;
use App\Program;
use App\Member;
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

    public function about()
    {
      return view('public.about');
    }

    public function create()
    {
      $programs = Program::all();
      return view('public.register', compact('programs'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|max:191',
          'email' => 'required|email|max:191',
          'come_from' => 'required|max:191',
          'address' => 'required',
          'phone_number' => 'required|numeric'
      ]);

      $object = new Member;
      $object->name = $request->get('name');
      $object->email = $request->get('email');
      $object->come_from = $request->get('come_from');
      $object->address = $request->get('address');
      $object->phone_number = $request->get('phone_number');
      $object->program_id = $request->get('program_id');
      //$object->status = $request->get('status');
      ///$object->user_id = NULL;
      $object->save();

      return redirect()->route('member.index')->with('success', 'Member has been successfully added!');
    }
}
