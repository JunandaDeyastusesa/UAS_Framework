<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Ruangan;
use App\Models\Guru;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function dashboard(){
        $title = "Dashboard";
        $siswaAll = Siswa::count();
        $sarana = Ruangan::count();
        $kelasAll = Kelas::count();
        $data = Siswa::latest()->take(5)->get();
        $Guru = Guru::count();
        return view('welcome', 
        compact('title','sarana','data','kelasAll','siswaAll','Guru'));

    }
}
