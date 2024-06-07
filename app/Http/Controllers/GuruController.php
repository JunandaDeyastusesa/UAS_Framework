<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//model
use App\Models\Guru;
use App\Models\Kelas;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guru";
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view('dashboard.guru.DataGuru', [
            'title' => $title,
            'guru' => $guru,
            'kelas' => $kelas
        ]);
        // $DataGuru = DB::table('gurus')->join('kelas', 'gurus.kelas', '=', 'kelas.id')
        //     ->select('gurus.*', 'gurus.id', 'gurus.nama_guru', 'kelas.nama_kelas', 'kelas.id as id_kelas')
        //     ->get();
        // return view('dashboard.Guru.DataGuru', [
        //     'title' => $title,
        //     'DataGuru' => $DataGuru,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Guru";
        $kelas = Kelas::all();
        $guru = Guru::all();
        // return view('list-barang.create', compact('_satuan'));
        return view('dashboard.guru.TambahDataGuru', compact('title', 'guru', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'kelas_id.unique' => 'Kelas sudah ditempati guru lain',
            // other messages...
        ];

        // $validator = Validator::make($request->all(), [
        //     'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        //     'nama_guru' => 'required|min:5',
        //     'jabatan' => 'required',
        //     'kelas_id' => 'required|unique:gurus,kelas_id', // pastikan input ini ada
        //     'tempat_lahir' => 'required|string|max:255',
        //     'tanggal_lahir' => 'required|date',
        //     'nik' => 'required|string|max:16',
        //     'no_kk' => 'required|string|max:16',
        //     'agama' => 'required|string|max:255',
        //     'jenis_kelamin' => 'required|string|max:255',
        //     'nomor_npwp' => 'required|string|max:255',
        //     'gelar_depan' => 'required|string|max:255',
        //     'gelar_belakang' => 'required|string|max:255',
        //     'nomor_telepon' => 'required|string|max:255',
        //     'nomor_hp' => 'required|string|max:255',
        //     'jenjang' => 'required|string|max:255',
        //     'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        //     'jurusan' => 'required|string|max:255',
        //     'jabatan' => 'required|string|max:255',
        //     'role' => 'required|string|max:255',
        //     'status' => 'required|string|max:255',
        // ], $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $guru = new Guru();
        // $guru->id_guru = $request->id_guru;
        // $guru->kelas_id = $request->kelas_id;
        $guru->kelas_id = $request->kelas_id ?? null;
        $guru->id_guru = $request->id_guru;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->no_telp = $request->no_telp;
        $guru->agama = $request->agama;
        $guru->jabatan = $request->jabatan;

        // Mengelola file foto siswa
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Menyimpan file ke direktori yang diinginkan di dalam penyimpanan publik
            $path = $image->storeAs('public/siswa', $imageName);

            // Mengupdate atribut foto_siswa dengan nama file yang disimpan
            $guru->foto = $imageName;
        }


        // Simpan data guru
        $guru->save();

        return redirect()->route('guru.index')->with(['Success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $title = "Guru";
    // Mengambil data guru berdasarkan ID
    $guru = Guru::findOrFail($id);
    // Mengambil semua data kelas
    $kelas = Kelas::all();
    return view('dashboard.guru.ShowDataGuru', [
        'title' => $title,
        'guru' => $guru,
        'kelas' => $kelas
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Data Guru";
        $kelas = Kelas::all();
        $guru = Guru::find($id);
        return view('dashboard.guru.EditDataGuru', compact('title', 'guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validator = Validator::make($request->all(), [
        //     // 'image'     => 'required|mimes:jpeg,jpg,png|max:2048',
        //     'nama_guru' => 'required|min:5',
        //     'kelas'     => 'required|unique:gurus,kelas',
        // ], ['kelas.unique' => 'Kelas sudah ditempati guru lain.']);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // $image = $request->file('image');
        // if($image){
        //     $filename = date('Y-m-d') . $image->getClientOriginalName();
        //     $path = 'guru/' . $filename;

        //     // Menggunakan putFile() untuk menyimpan file langsung
        //     Storage::disk('public')->put($path, file_get_contents($image));
        //     $data['image'] = $filename;
        // }

        // Guru::Where($id)->update([
        //     // 'foto'      => $filename,
        //     'nama_guru' => $request->nama_guru,
        //     'kelas'     => $request->kelas,
        // ]);

        $guru = Guru::find($id);
        $guru->id_guru = $request->id_guru;
        $guru->kelas_id = $request->kelas_id;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->no_telp = $request->no_telp;
        $guru->agama = $request->agama;
        $guru->jabatan = $request->jabatan;

        // Mengelola file foto siswa
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Menyimpan file ke direktori yang diinginkan di dalam penyimpanan publik
            $path = $image->storeAs('public/siswa', $imageName);

            $guru->foto = $imageName;
        }
        $guru->save();


        return redirect()->route('guru.index')->with(['Success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::find($id)->delete();
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
