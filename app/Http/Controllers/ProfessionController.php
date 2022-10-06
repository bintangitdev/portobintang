<?php

namespace App\Http\Controllers;

use App\Models\profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profession = profession::orderBy('id', 'desc')->paginate(3);
        return view('profession.index', ['profession' => $profession]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profession.create');
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
            'status' => 'required',
            'urutan' => 'required',
          ]);

          $postData = [
            'profesi' => $request->profesi,
            'status' => $request->status,
            'urutan' => $request->urutan,
        ];

        profession::create($postData);
          return redirect('/profession')->with(['message' => 'education added successfully!', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $Profession)
    {
        return view('profession.edit', ['profession' => $Profession]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profession $Profession)
    {
        $postData = [
            'profesi' => $request->profesi,
            'status' => $request->status,
            'urutan' => $request->urutan,
        ];

        $Profession->update($postData);
        return redirect('/profession')->with(['message' => 'education updated successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(profession $Profession)
    {
        $Profession->delete();
        return redirect('/profession')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}
