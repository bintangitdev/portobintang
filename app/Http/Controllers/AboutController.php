<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

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
      'deskripsi' => 'required|min:50',
      'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time() . '.' . $request->file->extension();
    // $request->image->move(public_path('images'), $imageName);
    $request->file->move('public/images', $imageName);
    //$request->file->storeAs('public/images', $imageName);

    $postData = [
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'telp' => $request->telp,
      'urutan' => $request->urutan,
      'deskripsi' => $request->deskripsi,
      'gambar' => $imageName
    ];

    About::create($postData);
    return redirect('/about')->with(['message' => 'About added successfully!', 'status' => 'success']);
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
    $imageName = '';
    if ($request->hasFile('file')) {
      #Get Image Path from Folder
      $path = 'public/images/' . $About->gambar;
      if (File::exists($path)) {
        File::delete($path);
      }
      $imageName = time() . '.' . $request->file->extension();
      $request->file->move('public/images', $imageName);
      //$request->file->storeAs('public/images', $imageName);

      //   if ($About->gambar) {
      //     $this->deleteOldImage('public/images/' . $About->gambar);
      //     //Storage::delete('public/images/' . $About->gambar);
      //   }
      // } else {
      //   $imageName = $About->gambar;
      // }

      $postData = [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'gambar' => $imageName,
        'deskripsi' => $request->deskripsi,
        'email' => $request->email,
        'telp' => $request->telp,
        'urutan' => $request->urutan

      ];
    }

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
