<?php

namespace App\Http\Controllers;

use Auth;
use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $informations = Information::with('user')->get();
      return view('information.index', compact('informations'));
  }

  public function detail($id)
  {
    $informations = Information::with('user')->where('id', $id)->get();
    return view('information.detail', compact('informations'));
  }

  public function create()
  {
    return view('information.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'title' => 'required|max:191',
        'description' => 'required',
        'path_img' => 'nullable|mimes:jpeg,bmp,png|max:1024'
    ]);

    if ($request->hasFile('path_img'))
    {
      $data = $request->input('path_img');
      $photo = $request->file('path_img')->getClientOriginalName();
      $destination = 'images/informations';
      $request->file('path_img')->storeAs($destination, $photo);
      $path_img = $destination."/".$photo;
    }
    else {
      $path_img = NULL;
    }

      $object = new Information;
      $object->title = $request->get('title');
      $object->description = $request->get('description');
      $object->path_img = $path_img;
      $object->user_id = Auth::user()->id;
      $object->save();

      return redirect()->route('information.index')->with('success', 'Information has been successfully added!');
  }

  public function show($id)
  {
    $informations = Information::where('id', $id)->first();
    return view('information.edit', compact('informations'));
  }

  public function update(Request $request, $id)
  {
    $datas = Information::find($id);
    $oldImage = $datas->path_img;

    $this->validate($request, [
      'title' => 'required|max:191',
      'description' => 'required',
      'path_img' => 'nullable|mimes:jpeg,bmp,png|max:1024'
    ]);

    if ($request->hasFile('path_img'))
    {
      if (file_exists(storage_path($oldImage))) {
        return redirect()->route('information.index')->with('warning', 'Edit failed, there is the same image!');
      }
      $newName = $request->file('path_img')->getClientOriginalName();
      $request->file('path_img')->storeAs('images/informations', $newName);
      $newPath = 'images/informations/'.$newName;
      $datas->path_img = $newPath;
      $datas->update();

      Storage::delete($oldImage);
    }

    //store to db
    $datas->update([
      'title' => $request->get('title'),
      'description' => $request->get('description'),
      'user_id' => Auth::user()->id
    ]);

    return redirect()->route('information.index')->with('success', 'Information has been successfully updated!');
  }

  public function destroy($id)
  {
    $datas = Information::findOrFail($id);
    $path = $datas->path_img;
    //if the file can be deleted then files data
    if (Storage::delete($path)) {
      $datas->delete();
      return redirect()->back()->with('success', 'Information has been successfully deleted!');
    }else {
      return redirect()->back()->with('warning', 'Delete information failed!');
    }
  }
}
