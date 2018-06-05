<?php

namespace App\Http\Controllers;

use Auth;
use App\Member;
use App\Program;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
      return $this->middleware('auth');
    }

    public function index()
    {
      $members = Member::with('program')->get();
      return view('member.index', compact('members'));
    }

    public function detail($id)
    {
      $members = Member::with('program', 'user')->first();
      return view('member.detail', compact('members'));
    }

    public function create()
    {
      $programs = Program::all();
      return view('member.create', compact('programs'));
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
      $object->status = $request->get('status');
      $object->user_id = Auth::user()->id;
      $object->save();

      return redirect()->route('member.index')->with('success', 'Member has been successfully added!');
    }

    public function show($id)
    {
      $members = Member::with('program')->where('id', $id)->first();
      $programs = Program::orderBy('program_name', 'ASC')->get();
      return view('member.edit', compact('members', 'programs'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'name' => 'required|max:191',
          'come_from' => 'required|max:191',
          'address' => 'required',
          'phone_number' => 'required|numeric'
      ]);

      //store to db
      $datas->update([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'come_from' => $request->get('come_from'),
        'address' => $request->get('address'),
        'phone_number' => $request->get('phone_number'),
        'program_id' => $request->get('program_id'),
        'status' => $request->get('status'),
        'user_id' => Auth::user()->id
      ]);

      return redirect()->route('member.index')->with('success', 'Member has been successfully updated!');
    }

    public function destroy($id)
    {
      $datas = Member::findOrFail($id);
      $datas->delete();
      return redirect()->back()->with('success', 'Member has been successfully deleted!');
    }
}
