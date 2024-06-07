<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//model
use App\Models\Guru;
use App\Models\Kelas;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete();
        $title = "Guru";
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view('dashboard.guru.DataGuru', [
            'title' => $title,
            'guru' => $guru,
            'kelas' => $kelas
        ]);

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
        // Pesan kesalahan kustom
        $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'numeric' => ':attribute harus berupa angka.',
            'string' => ':attribute harus berupa string.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'in' => ':attribute harus salah satu dari: :values.',
            'exists' => ':attribute tidak valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa file dengan tipe: :values.',
        ];

        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'kelas_id' => 'required|numeric|unique:gurus,kelas_id',
            'id_guru' => 'required|numeric|unique:gurus,id_guru',
            'nama_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|numeric',
            'agama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Inisialisasi objek Guru
        $guru = new Guru();
        $guru->kelas_id = $request->kelas_id ?? null;
        $guru->id_guru = $request->id_guru;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->no_telp = $request->no_telp;
        $guru->agama = $request->agama;
        $guru->jabatan = $request->jabatan;

        // Mengelola file foto guru
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/guru', $imageName);
            $guru->foto = $imageName;
        }

        // Simpan data guru
        $guru->save();

        Alert::success('Berhasil Tambah Data', 'Data berhasil ditambahkan.');
        // Redirect ke halaman yang sesuai
        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil disimpan!');
    }


    public function show(string $id)
    {
        $title = "Guru";
        $guru = Guru::findOrFail($id);
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
        // Pesan kesalahan kustom
        $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'numeric' => ':attribute harus berupa angka.',
            'string' => ':attribute harus berupa string.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'in' => ':attribute harus salah satu dari: :values.',
            'exists' => ':attribute tidak valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa file dengan tipe: :values.',
        ];

        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|numeric',
            'agama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ], $messages);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $guru = Guru::find($id);
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

        Alert::success('Berhasil di Ubah', 'Data berhasil diperbarui.');

        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::find($id)->delete();
        Alert::success('Data Telah di Hapus', 'Data Berhasil di Hapus.');
        return redirect()->route('guru.index');
    }
}
