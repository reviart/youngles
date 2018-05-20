<?php

namespace App\Http\Controllers;

use Auth;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $programs = Program::with('user')->get();
        return view('program.index', compact('programs'));
    }

    public function detail($id)
    {
      $programs = Program::with('user')->where('id', $id)->get();
      return view('program.detail', compact('programs'));
    }

    public function create()
    {
      return view('program.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'program_name' => 'required|max:191',
          'description' => 'required',
          'price' => 'required|numeric|min:100000|max:2000000',
          'path_img' => 'nullable|mimes:jpeg,bmp,png|max:1024'
      ]);

        $data = $request->input('path_img');
        $photo = $request->file('path_img')->getClientOriginalName();
        $destination = 'images/programs';
        $path_img = $destination."/".$photo;
        if (file_exists($path_img)) {
          return redirect()->route('program.index')->with('warning', 'Create failed, there is the same image!');
        }
        $request->file('path_img')->storeAs($destination, $photo);        

        $object = new Program;
        $object->program_name = $request->get('program_name');
        $object->description = $request->get('description');
        $object->price = $request->get('price');
        $object->path_img = $destination."/".$photo;
        $object->user_id = Auth::user()->id;
        $object->save();

        return redirect()->route('program.index')->with('success', 'Program has been successfully added!');
    }

    public function show($id)
    {
      $programs = Program::where('id', $id)->first();
      return view('program.edit', compact('programs'));
    }

    public function update(Request $request, $id)
    {
      $datas = Program::find($id);
      $oldImage = $datas->path_img;

      $this->validate($request, [
        'program_name' => 'required|max:191',
        'description' => 'required',
        'price' => 'required|numeric|min:100000|max:2000000',
        'path_img' => 'nullable|mimes:jpeg,bmp,png|max:1024'
      ]);

      if ($request->hasFile('path_img'))
      {
        $newName = $request->file('path_img')->getClientOriginalName();
        $newPath = 'images/programs/'.$newName;
        if (file_exists($newPath)) {
          return redirect()->route('program.index')->with('warning', 'Edit failed, there is the same image!');
        }
        $request->file('path_img')->storeAs('images/programs', $newName);
        $datas->path_img = $newPath;
        $datas->update();

        Storage::delete($oldImage);
      }

      //store to db
      $datas->update([
        'program_name' => $request->get('program_name'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
        'user_id' => Auth::user()->id
      ]);

      return redirect()->route('program.index')->with('success', 'Program has been successfully updated!');
    }

    public function destroy($id)
    {
      $datas = Program::findOrFail($id);
      $path = $datas->path_img;
      //if the file can be deleted then files data
      if (Storage::delete($path)) {
        $datas->delete();
        return redirect()->back()->with('success', 'Program has been successfully deleted!');
      }else {
        return redirect()->back()->with('warning', 'Delete program failed!');
      }
    }
}
