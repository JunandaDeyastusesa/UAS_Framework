<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete();
        $title = "Data Siswa";
        $kelas = Kelas::all();
        $data = Siswa::all();
        return view('dashboard.Siswa.DataSiswa', [
            'title' => $title,
            'kelas' => $kelas,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Siswa";
        $kelas = Kelas::all();
        return view('dashboard.Siswa.TambahDataSiswa', compact('title', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'NISN' => 'required|unique:siswas,nisn|numeric',
            'NIS' => 'required|numeric',
            'nama_siswa' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'wali_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
            'agama' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'anak_ke' => 'required|numeric',
            'foto_siswa' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], ['NISN.unique' => 'NISN sudah ada.']);

        // Inisialisasi objek Siswa
        $siswa = new Siswa();
        $siswa->NISN = $request->NISN;
        $siswa->NIS = $request->NIS;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->wali_siswa = $request->wali_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->agama = $request->agama;
        $siswa->tempat = $request->tempat;
        $siswa->anak_ke = $request->anak_ke;

        // Mengelola file foto siswa
        if ($request->hasFile('foto_siswa')) {
            $image = $request->file('foto_siswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/siswa', $imageName);
            $siswa->foto_siswa = $imageName;
        }

        // Simpan data siswa
        $siswa->save();
        Alert::success('Added Successfully', 'Employee Data Added Successfully.');

        // Redirect ke halaman yang sesuai
        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Siswa";
        $kelas = Kelas::all();
        $siswa = Siswa::findOrFail($id);
        return view('dashboard.Siswa.EditDataSiswa', compact('title', 'siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'NISN' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'wali_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            // 'kelas_id' => 'required|exists:kelas,id',
            'agama' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'anak_ke' => 'required|numeric',
            'semester' => 'required|in:Semester 1,Semester 2',
            'foto_siswa' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->NISN = $request->NISN;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->wali_siswa = $request->wali_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas;
        $siswa->agama = $request->agama;
        $siswa->tempat = $request->tempat;
        $siswa->anak_ke = $request->anak_ke;
        $siswa->semester = $request->semester;

        // Mengelola file foto siswa
        if ($request->hasFile('foto_siswa')) {
            $image = $request->file('foto_siswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/siswa', $imageName);
            // Mengupdate atribut foto_siswa dengan nama file yang disimpan
            $siswa->foto_siswa = $imageName;
        }

        // Simpan data siswa yang telah diupdate
        $siswa->save();

        Alert::success('Changed Successfully', 'Employee Data Changed Successfully.');
        // Redirect ke halaman yang sesuai
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function updateSemester(Request $request)
    {
        // Validasi request
        $request->validate([
            'siswas' => 'required|array', // Pastikan array ID siswa tidak kosong
            'siswas.*' => 'required|integer|exists:siswas,id', // Pastikan setiap ID siswa valid
        ]);

        // Ambil array ID siswa
        $idSiswas = $request->input('siswas');

        // Ambil semua data siswa berdasarkan ID
        $siswas = Siswa::whereIn('id', $idSiswas)->get();

        // Naikkan semester semua siswa
        foreach ($siswas as $siswa) {
            // Periksa nilai semester saat ini
            if ($siswa->semester === 'Semester 1') {
                $siswa->semester = 'Semester 2'; // Ubah ke semester 2
                // if ($siswa->kelas_id === 1) {
                //     $siswa->kelas_id = 4;
                // } else if ($siswa->kelas_id === 4) {
                //     $siswa->kelas_id = 5;
                // } else if ($siswa->kelas_id === 5) {
                //     $siswa->kelas_id = 6;
                // } else if ($siswa->kelas_id === 6) {
                //     $siswa->kelas_id = 7;
                // } else if ($siswa->kelas_id === 7) {
                //     $siswa->kelas_id = 8;
                // } else {
                //     $siswa->kelas_id = 10;
                // }
                // $siswa->save(); // Simpan perubahan
            } else if ($siswa->semester === 'Semester 2') {
                $siswa->semester = 'Semester 1'; // Ubah ke semester 1

                if ($siswa->kelas_id === "9") {
                    $siswa->kelas_id = "6";
                } else if ($siswa->kelas_id === 6) {
                    $siswa->kelas_id = 9;
                } else if ($siswa->kelas_id === 5) {
                    $siswa->kelas_id = 6;
                } else if ($siswa->kelas_id === 6) {
                    $siswa->kelas_id = 7;
                } else if ($siswa->kelas_id === 7) {
                    $siswa->kelas_id = 8;
                } else {
                    $siswa->kelas_id = 10;
                }
            }
            Alert::success('Siswa Telah Naik Kelas', 'Siswa Telah Berhasil Naik Kelas.');


            $siswa->save(); // Simpan perubahan
        }

        // Berikan pesan sukses
        return redirect()->back()->with('success', 'Semester ' . count($siswas) . ' siswa telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan dan hapus data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        Alert::success('Deleted Successfully', 'Employee Data Deleted Successfully.');

        // Redirect ke halaman yang sesuai
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
