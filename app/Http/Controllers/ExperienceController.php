<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Exp = experience::orderBy('id', 'desc')->paginate(3);
        return view('experience.index', ['experience' => $Exp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experience.create');
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
            'profesi' => 'required',
            'perusahaan' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'jenis' => 'required',
            'urutan' => 'required',
            'status' => 'required',
            'deskripsi' => 'required|min:50',
        ]);

        $postData = [
            'profesi' => $request->profesi,
            'perusahaan' => $request->perusahaan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'jenis' => $request->jenis,
            'urutan' => $request->urutan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ];

        experience::create($postData);
        return redirect('/experience')->with(['message' => 'experience added successfully!', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(experience $Experience)
    {
        return view('experience.edit', ['experience' => $Experience]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience $Experience)
    {
        $postData = [
            'profesi' => $request->profesi,
            'perusahaan' => $request->perusahaan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'jenis' => $request->jenis,
            'urutan' => $request->urutan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ];

        $Experience->update($postData);
        return redirect('/experience')->with(['message' => 'education updated successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $Experience)
    {
        $Experience->delete();
        return redirect('/experience')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
