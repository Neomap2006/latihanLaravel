<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('kelas')->get();
        $kelas = Kelas::all();
        return view('mahasiswa.index', compact('data','kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'nim'      => 'required|unique:mahasiswa,nim',
            'jurusan'  => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Mahasiswa::create($request->only('nama','nim','jurusan','kelas_id'));
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mhs','kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required',
            'nim'      => 'required',
            'jurusan'  =>  'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->only('nama','nim','jurusan','kelas_id'));

        return redirect()->route('mahasiswa.index')->with('success','Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();

        return redirect()->route('mahasiswa.index')->with('success','Data berhasil dihapus!');
    }
}
