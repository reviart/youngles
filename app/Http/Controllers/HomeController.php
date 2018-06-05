<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Member;
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
      $members = Member::count();
      return view('home', compact('members'));
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

    public function update(Request $request, $id)
    {
      $datas = User::find($id);
      $oldImage = $datas->path_img;
      $this->validate($request, [
        'name' => 'required|string|max:191',
        'path_img' => 'nullable|mimes:jpeg,bmp,png|max:2048'
      ]);
      if ($request->hasFile('path_img'))
      {
        $newName = $request->file('path_img')->getClientOriginalName();
        $newPath = 'images/users/'.$newName;
        if (file_exists($newPath)) {
          return redirect()->route('profile.home')->with('warning', 'Edit failed, there is the same image!');
        }
        $request->file('path_img')->storeAs('images/users', $newName);

        if (is_null($oldImage)){
          $datas->path_img = $newPath;
          $datas->update();
        }
        else{
          $datas->path_img = $newPath;
          $datas->update();
          Storage::delete($oldImage);
        }
      }
      //store to db
      $datas->update([
        'name' => $request->get('name'),
        'job' => $request->get('job')
      ]);
      return redirect()->route('profile.home')->with('success', 'Profile has been successfully updated!');
    }
}
