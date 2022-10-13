<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $abouts = About::orderBy('id', 'desc')->paginate(3);
    return view('about.index', ['abouts' => $abouts]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('about.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'alamat' => 'required',
      'email' => 'required|email',
      'telp' => 'required',
      'urutan' => 'required',
      'status' => 'required',
      'gelar' => 'required',
      'deskripsi' => 'required|min:50',
      'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_name = preg_replace('!\s+!', ' ', $file_name);
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('%', '', $file_name);
        $file->move('images/skills/', $file_name);

    $postData = [
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'telp' => $request->telp,
      'urutan' => $request->urutan,
      'status' => $request->status,
      'gelar' => $request->gelar,
      'deskripsi' => $request->deskripsi,
      'gambar' => $file_name
    ];
    About::create($postData);
        return redirect('/about')->with(['message' => 'socialmedia added successfully!', 'status' => 'success']);
    } else {
        return redirect()->route('/about')->with('danger', 'Mohon masukkan foto!');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\About  $product
   * @return \Illuminate\Http\Response
   */
  public function show(About $abouts)
  {
    return view('about.show', ['abouts' => $abouts]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  AppModelsAbout  $post
   * @return IlluminateHttpResponse
   */
  public function edit(About $About)
  {
    return view('about.edit', ['about' => $About]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @param  AppModelsAbout  $abouts
   * @return IlluminateHttpResponse
   */
  public function update(Request $request, About $About)
  {
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_name = preg_replace('!\s+!', ' ', $file_name);
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('%', '', $file_name);
        $file->move('images/skills/', $file_name);

      if ($About->gambar) {
        Storage::delete('images/skills/' . $About->gambar);
      }
    } else {
      $file_name = $About->gambar;
    }

    $postData = [
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'gambar' => $file_name,
      'deskripsi' => $request->deskripsi,
      'email' => $request->email,
      'telp' => $request->telp,
      'gelar' => $request->gelar,
      'status' => $request->status,
      'urutan' => $request->urutan

    ];

    $About->update($postData);
    return redirect('/about')->with(['message' => 'About updated successfully!', 'status' => 'success']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  AppModelsAbout  $abouts
   * @return IlluminateHttpResponse
   */
  public function destroy(About $About)
  {
    Storage::delete('public/images/' . $About->gambar);
    $About->delete();
    return redirect('/about')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
  }
}
