<?php

namespace App\Http\Controllers;

use App\Models\socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialmedias = socialmedia::orderBy('id', 'desc')->paginate(3);
        return view('socialmedia.index', ['socialmedias' => $socialmedias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socialmedia.create');
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
            'username' => 'required',
            'link' => 'required',
            'status' => 'required',
            'urutan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_name = preg_replace('!\s+!', ' ', $file_name);
            $file_name = str_replace(' ', '_', $file_name);
            $file_name = str_replace('%', '', $file_name);
            $file->move('public/images', $file_name);
            //$file->move(public_path($this->url_photo), $file_name);
            $postData = ['nama' => $request->nama, 'username' => $request->username, 'link' => $request->link, 'status' => $request->status, 'urutan' => $request->urutan, 'icon' => $file_name];

            // Photo::create([
            //     'nama' => $request->nama,
            //     'file' => $file_name,
            // ]);

            // $imageName = time() . '.' . $request->file->extension();
            // // $request->image->move(public_path('images'), $imageName);
            // $request->file->storeAs(asset('images'), $imageName);

            //$postData = ['nama' => $request->nama, 'username' => $request->username, 'link' => $request->link, 'status' => $request->status, 'urutan' => $request->urutan, 'icon' => $imageName];

            socialmedia::create($postData);
            return redirect('/socialmedia')->with(['message' => 'socialmedia added successfully!', 'status' => 'success']);
        } else {
            return redirect()->route('/socialmedia')->with('danger', 'Mohon masukkan foto!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function show(socialmedia $socialmedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function edit(socialmedia $Socialmedia)
    {
        return view('socialmedia.edit', ['socialmedia' => $Socialmedia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, socialmedia $socialmedia)
    {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'link' => 'required',
            'status' => 'required',
            'urutan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_name = preg_replace('!\s+!', ' ', $file_name);
            $file_name = str_replace(' ', '_', $file_name);
            $file_name = str_replace('%', '', $file_name);
            $file->move('public/images', $file_name);
        } else {
            $file_name = $socialmedia->icon;
        }

        $postData = [
            'nama' => $request->nama,
            'username' => $request->username,
            'link' => $request->link,
            'status' => $request->status,
            'urutan' => $request->urutan,
            'icon' => $file_name
        ];

        $socialmedia->update($postData);
        return redirect()->route('socialmedia.index')->with('success', 'Social Media berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(socialmedia $socialmedia)
    {
        Storage::delete('public/images/' . $socialmedia->icon);
        $socialmedia->delete();
        return redirect('/socialmedia')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
