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
      $members = User::count();
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
      $oldImage = $datas->path;

      $this->validate($request, [
        'name' => 'required|string|max:191',
        'email' => 'required|string|email|max:191|unique:users',
        'path_img' => 'nullable|mimes:jpeg,bmp,png|max:2048'
      ]);

      if ($request->hasFile('path'))
      {
        if (file_exists(storage_path($oldImage))) {
          return redirect()->route('produk.index')->with('warning', 'Gagal edit produk, terdapat gambar yang sama!');
        }
        $file     = $request->file('path_img');
        $fileName = $file->getClientOriginalName();
        //$fileExt  = $file->getClientOriginalExtension();

        //Move Uploaded File
        $destinationPath = 'Images/';
        $file->move($destinationPath, $fileName);

        $newPath = 'Images/'.$fileName;
        $datas->path = $newPath;
        $datas->update();
      }

      //store to db
      $datas->update([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'job' => $request->get('job')
      ]);

      return redirect()->route('produk.index')->with('success', 'profile has been successfully updated!');
    }
}
