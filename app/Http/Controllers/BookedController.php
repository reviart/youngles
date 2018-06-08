<?php

namespace App\Http\Controllers;

use Auth;
use App\Booked;
use App\Program;
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
      //dd($bookeds);
      return view('booked.detail', compact('bookeds'));
    }

    public function move(Request $request, $id)
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

      //store to db
      $datas->update([
        'full_name' => $request->get('full_name'),
        'email' => $request->get('email'),
        'dob' => $request->get('dob'),
        'gender' => $request->get('gender'),
        'come_from' => $request->get('come_from'),
        'address' => $request->get('address'),
        'phone_number' => $request->get('phone_number'),
        'program_id' => $request->get('program_id'),
        'description' => $request->get('description')
      ]);

      return redirect()->route('booked.index')->with('success', 'Booked has been successfully updated!');
    }

    public function destroy($id)
    {
      $datas = Booked::findOrFail($id);
      $datas->delete();
      return redirect()->back()->with('success', 'Booked has been successfully deleted!');
    }
}
