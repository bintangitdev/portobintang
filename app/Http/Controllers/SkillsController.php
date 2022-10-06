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
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'urutan' => 'required',
            'status' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images', $imageName);

        $postData = [
            'nama' => $request->nama,
            'gambar' => $imageName,
            'jenis' => $request->jenis,
            'urutan' => $request->urutan,
            'status' => $request->status
        ];

        skills::create($postData);
        return redirect('/skills')->with(['message' => 'About added successfully!', 'status' => 'success']);
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
        $imageName = '';
        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images', $imageName);

            if ($Skill->gambar) {
                Storage::delete('public/images/' . $Skill->gambar);
            }
        } else {
            $imageName = $Skill->gambar;
        }

        $postData = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'urutan' => $request->urutan,
            'status' => $request->status,
            'gambar' => $imageName

        ];

        $Skill->update($postData);
        return redirect('/skills')->with(['message' => 'About updated successfully!', 'status' => 'success']);
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
