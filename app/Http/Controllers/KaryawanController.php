<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Menampilkan daftar semua karyawan
     */
    public function index()
    {
        $karyawans = Karyawan::with('departemen')->latest()->get();
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Menampilkan form tambah karyawan
     */
    public function create()
    {
        $departemens = Departemen::all();
        return view('karyawan.create', compact('departemens'));
    }

    /**
     * Menyimpan data karyawan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:karyawans,email',
            'jabatan'       => 'nullable|string|max:255',
            'alamat'        => 'nullable|string',
            'gaji'          => 'required|numeric',
            'departemen_id' => 'nullable|exists:departemens,id',
        ]);

        // Simpan data
        Karyawan::create([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'jabatan'       => $request->jabatan,
            'alamat'        => $request->alamat,
            'gaji'          => $request->gaji,
            'departemen_id' => $request->departemen_id,
        ]);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit karyawan
     */
    public function edit(Karyawan $karyawan)
    {
        $departemens = Departemen::all();
        return view('karyawan.edit', compact('karyawan', 'departemens'));
    }

    /**
     * Memperbarui data karyawan
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'jabatan'       => 'nullable|string|max:255',
            'alamat'        => 'nullable|string',
            'gaji'          => 'required|numeric',
            'departemen_id' => 'nullable|exists:departemens,id',
        ]);

        $karyawan->update([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'jabatan'       => $request->jabatan,
            'alamat'        => $request->alamat,
            'gaji'          => $request->gaji,
            'departemen_id' => $request->departemen_id,
        ]);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Menghapus data karyawan
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil dihapus!');
    }
}
