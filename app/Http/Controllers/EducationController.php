<?php

namespace App\Http\Controllers;

use App\Models\education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edc = education::orderBy('id', 'desc')->paginate(3);
        return view('education.index', ['education' => $edc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
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
            'instansi' => 'required',
            'jurusan' => 'required',
            'nilai' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'deskripsi' => 'required|min:50',
            'status' => 'required',
            'urutan' => 'required',
          ]);

          $postData = [
            'instansi' => $request->instansi,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'urutan' => $request->urutan,
        ];

          education::create($postData);
          return redirect('/education')->with(['message' => 'education added successfully!', 'status' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(education $education)
    {
        return view('education.show', ['education' => $education]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(education $Education)
    {
        return view('education.edit', ['education' => $Education]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, education $Education)
    {
        $postData = [
            'instansi' => $request->instansi,
            'jurusan' => $request->jurusan,
            'nilai' => $request->nilai,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'urutan' => $request->urutan,
        ];

        $Education->update($postData);
        return redirect('/education')->with(['message' => 'education updated successfully!', 'status' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(education $Education)
    {
        $Education->delete();
        return redirect('/education')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
