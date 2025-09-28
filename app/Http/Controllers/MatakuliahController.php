<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::all();
        return view('matakuliah.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Matakuliah::create($request->only('nama_matkul', 'deskripsi'));

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $matkul = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matkul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $matkul = Matakuliah::findOrFail($id);
        $matkul->update($request->only('nama_matkul', 'deskripsi'));

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $matkul = Matakuliah::findOrFail($id);
        $matkul->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil dihapus');
    }
}