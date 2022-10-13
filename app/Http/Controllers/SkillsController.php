<?php

namespace App\Http\Controllers;

use App\Models\skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = skills::orderBy('id', 'desc')->paginate(20);
        return view('skills.index', ['skill' => $skill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_name = preg_replace('!\s+!', ' ', $file_name);
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('%', '', $file_name);
        $file->move('images/skills/', $file_name);
        //$file->move(public_path($this->url_photo), $file_name);
        $postData = [
            'jenis' => $request->input('jenis'),
            'nama' => $request->input('nama'),
            'urutan' => $request->input('urutan'),
            'status' => $request->input('status'),
            'gambar' =>  $file_name
        ];



        // Photo::create([
        //     'nama' => $request->nama,
        //     'file' => $file_name,
        // ]);

        // $imageName = time() . '.' . $request->file->extension();
        // // $request->image->move(public_path('images'), $imageName);
        // $request->file->storeAs(asset('images'), $imageName);

        //$postData = ['nama' => $request->nama, 'username' => $request->username, 'link' => $request->link, 'status' => $request->status, 'urutan' => $request->urutan, 'icon' => $imageName];

        skills::create($postData);
        return redirect('/skills')->with(['message' => 'socialmedia added successfully!', 'status' => 'success']);
    } else {
        return redirect()->route('/skills')->with('danger', 'Mohon masukkan foto!');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(skills $Skills)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(skills $Skill)
    {
        return view('skills.edit', ['Skill' => $Skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skills $Skill)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis' => 'required',
            'urutan' => 'required',
            'status' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_name = preg_replace('!\s+!', ' ', $file_name);
            $file_name = str_replace(' ', '_', $file_name);
            $file_name = str_replace('%', '', $file_name);
            $file->move('images/skills/', $file_name);
        } else {
            $file_name = $Skill->gambar;
        }

        $postData = [
            'jenis' => $request->input('jenis'),
            'nama' => $request->input('nama'),
            'urutan' => $request->input('urutan'),
            'status' => $request->input('status'),
            'gambar' =>  $file_name
        ];

        $Skill->update($postData);
        return redirect()->route('/skills')->with('success', 'Social Media berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(skills $Skill)
    {
        Storage::delete('public/images/' . $Skill->gambar);
        $Skill->delete();
        return redirect('/skills')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
