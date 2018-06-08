<?php

namespace App\Http\Controllers;

use App\Information;
use App\Program;
use App\Booked;
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
        'full_name' => 'required|max:191',
        'email' => 'required|email|max:191',
        'dob' => 'required|date',
        'gender' => 'required|max:191',
        'come_from' => 'required|max:191',
        'address' => 'required',
        'phone_number' => 'required|numeric'
      ]);

      $object = new Booked;
      $object->full_name = $request->get('full_name');
      $object->email = $request->get('email');
      $object->dob = $request->get('dob');
      $object->gender = $request->get('gender');
      $object->come_from = $request->get('come_from');
      $object->address = $request->get('address');
      $object->phone_number = $request->get('phone_number');
      $program_id = $request->get('program_id');
      $object->program_id = $program_id;

      $price = Program::where('id', $program_id)->select('price')->first();
      $description = "Silahkan melakukan tf ke-xxx sebesar $price->price";

      $object->description = $description;
      $object->save();

      return redirect()->route('public.register')->with('success', 'Registration success, please check your email!');
    }
}
