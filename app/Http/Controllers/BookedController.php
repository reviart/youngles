<?php

namespace App\Http\Controllers;

use Auth;
use App\Booked;
use App\Program;
use App\Member;
use Illuminate\Http\Request;

class BookedController extends Controller
{
    public function __construct()
    {
      return $this->middleware('auth');
    }

    public function index()
    {
      $bookeds = Booked::with('program')->get();
      return view('booked.index', compact('bookeds'));
    }

    public function detail($id)
    {
      $bookeds = Booked::with('program')->where('id', $id)->first();
      return view('booked.detail', compact('bookeds'));
    }

    public function move($id)
    {
      $bookeds = Booked::where('id', $id)->first();

      $object = new Member;
      $object->full_name = $bookeds->full_name;
      $object->email = $bookeds->email;
      $object->dob = $bookeds->dob;
      $object->gender = $bookeds->gender;
      $object->come_from = $bookeds->come_from;
      $object->address = $bookeds->address;
      $object->phone_number = $bookeds->phone_number;
      $object->program_id = $bookeds->program_id;
      $object->status = "Membership";
      $object->user_id = Auth::user()->id;
      $object->save();

      $bookeds->delete();

      return redirect()->route('booked.index')->with('success', 'The data has been successfully confirmed!');
    }

    public function destroy($id)
    {
      $datas = Booked::findOrFail($id);
      $datas->delete();
      return redirect()->back()->with('success', 'Booked has been successfully deleted!');
    }
}
