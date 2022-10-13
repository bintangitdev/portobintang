<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolio = portofolio::orderBy('id', 'desc')->paginate(3);
        return view('portofolio.index', ['portofolio' => $portofolio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portofolio.create');
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
            'link' => 'required',
            'status' => 'required',
            'urutan' => 'required',
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
            'link' => $request->link,
            'status' => $request->status,
            'urutan' => $request->urutan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $file_name
          ];
          portofolio::create($postData);
          return redirect('/portofolio')->with(['message' => 'socialmedia added successfully!', 'status' => 'success']);
      } else {
          return redirect()->route('/portofolio')->with('danger', 'Mohon masukkan foto!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $Portofolio)
    {
        return view('portofolio.edit', ['Portofolio' => $Portofolio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $Portofolio)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_name = preg_replace('!\s+!', ' ', $file_name);
            $file_name = str_replace(' ', '_', $file_name);
            $file_name = str_replace('%', '', $file_name);
            $file->move('images/skills/', $file_name);

          if ($Portofolio->gambar) {
            Storage::delete('images/skills/' . $Portofolio->gambar);
          }
        } else {
          $file_name = $Portofolio->gambar;
        }

        $postData = [
            'nama' => $request->nama,
            'link' => $request->link,
            'status' => $request->status,
            'urutan' => $request->urutan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $file_name
        ];

        $Portofolio->update($postData);
        return redirect('/portofolio')->with(['message' => 'About updated successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $Portofolio)
    {
        Storage::delete('public/images/' . $Portofolio->gambar);
        $Portofolio->delete();
        return redirect('/portofolio')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
