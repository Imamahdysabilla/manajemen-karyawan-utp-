<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
    'nama' => 'required|unique:departemens,nama',
    'deskripsi' => 'nullable',
]);

Departemen::create([
    'nama' => $request->nama,
    'deskripsi' => $request->deskripsi,
]);

        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    public function edit(Departemen $departemen)
    {
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $request->validate(['nama_departemen' => 'required']);
        $departemen->update($request->all());
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil diperbarui');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil dihapus');
    }
}
