<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    public function index()
    {
        confirmDelete();
        // none
    }

    /**
     * To form crate
     */
    public function create(Request $request)
    {
        $title = "Tambah Barang";
        $lantai = $request->query('lantai', 'Lantai 1');
        $ruangan = Ruangan::where('lantai', $lantai)->get();

        // Redirect
        return view('dashboard.Sarpra.Barang.createBarang', compact('title', 'lantai', 'ruangan'));
    }

    /**
     * Add data to database
     */
    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'barang_baik.required' => 'Jumlah barang baik harus diisi.',
            'barang_baik.integer' => 'Jumlah barang baik harus berupa angka.',
            'barang_baik.min' => 'Jumlah barang baik tidak boleh kurang dari 0.',
            'barang_rusak.required' => 'Jumlah barang rusak harus diisi.',
            'barang_rusak.integer' => 'Jumlah barang rusak harus berupa angka.',
            'barang_rusak.min' => 'Jumlah barang rusak tidak boleh kurang dari 0.',
            'deskripsi.nullable' => 'Deskripsi bersifat opsional.',
            'ruangan_id.required' => 'ID ruangan harus diisi.',
            'ruangan_id.exists' => 'ID ruangan tidak valid.',
        ];
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'barang_baik' => 'required|integer|min:0',
            'barang_rusak' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
            'ruangan_id' => 'required|exists:ruangans,id',
        ], $messages);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data ke database
        $barang = new Barang();
        $barang->nama = $request->input('nama');
        $barang->barang_baik = $request->input('barang_baik');
        $barang->barang_rusak = $request->input('barang_rusak');
        $barang->deskripsi = $request->input('deskripsi');
        $barang->ruangan_id = $request->input('ruangan_id');
        $barang->save();

        // Ambil nilai lantai dari ruangan_id
        $ruangan = Ruangan::findOrFail($request->input('ruangan_id'));
        $lantai = $ruangan->lantai;

        Alert::success('Berhasil di Tambahkan', 'Data berhasil di Tamabahkan.');
        // Redirect
        return redirect()->route('showLantai', ['lantai' => $lantai]);
    }

    /**
     * See Data (Pop Pp)
     */
    public function show(string $id)
    {
    }

    /**
     * To form update
     */
    public function edit(string $id)
    {
        // Find barang by id
        $barang = Barang::query()->find((integer)$id);
        $title = "Edit Barang";

        // find lantai in barang
        $ruangan = Ruangan::findOrFail($barang->ruangan_id);
        $lantai = $ruangan->lantai;

        // find data ruangan from lantai
        $dataRuangan = Ruangan::where('lantai', $lantai)->get();

        // Redirect
        return view('dashboard.Sarpra.Barang.EditBarang', data: compact(['barang', 'title', 'lantai', 'dataRuangan']));
    }

    /**
     * Action update data
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'barang_baik' => 'required|integer|min:0',
            'barang_rusak' => 'required|integer|min:0',
            'deskripsi' => 'nullable',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // First find by id
        $barang = Barang::findOrFail($id);

        // Update data use fill
        $barang->fill($request->only(['nama', 'barang_baik', 'barang_rusak', 'deskripsi']));
        $barang->save();

        $ruangan = Ruangan::findOrFail($barang->ruangan_id);
        $lantai = $ruangan->lantai;

        // Redirect
        Alert::success('Berhasil di Perbarui', 'Data berhasil di Perbarui.');
        return redirect()->route('showLantai', $lantai);
    }

    /**
     * Remove data
     */
    public function destroy(string $id)
    {
        $findBarang = Barang::query()->find((integer)$id);

        // Ambil nilai lantai dari ruangan_id
        $ruangan = Ruangan::findOrFail($findBarang->ruangan_id);
        $lantai = $ruangan->lantai;

        // Delete barang
        $findBarang->delete();

        Alert::success('Data Telah di Hapus', 'Data Berhasil di Hapus.');
        return redirect()->route('showLantai', $lantai);
    }
}
