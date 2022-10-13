<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profession;
use App\Models\socialmedia;
use App\Models\education;
use App\Models\About;
use App\Models\skills;
use App\Models\portofolio;
use App\Models\User;
use App\Models\experience;
//use App\Models\Visitor;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $user = User::first()->toArray();
        $profession = profession::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        $about = About::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        $profession_string = profession::where('status', 1)->orderBy('urutan', 'asc')->get()->implode('profesi', ' , ');
        $socialMedia = socialmedia::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        $skills = skills::where('status', 1)->orderBy('jenis', 'asc')->orderBy('nama', 'asc')->get()->toArray();
        $education = education::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        $experience = experience::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        //$experience = experience::with('referensi', 'profession')->where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();
        $portofolio = portofolio::where('status', 1)->orderBy('urutan', 'asc')->get()->toArray();

        $index = [
            'user' => $user,
            'about' => $about,
            'profession' => $profession,
            'profession_string' => $profession_string,
            'socialmedia' => $socialMedia,
            'education' => $education,
            'skills' => $skills,
            'experience' => $experience,
            'portofolio' => $portofolio
        ];

        // $visitor = Visitor::create([
        //     'ip' => $request->ip(),
        //     'browser' => $request->header('sec-ch-ua'),
        //     'os' => str_replace('"', "", $request->header('sec-ch-ua-platform'))
        // ]);

        return view('index', $index);
    }

    // public function login2()
    // {
    //     return view('auth.login2');
    // }
}
