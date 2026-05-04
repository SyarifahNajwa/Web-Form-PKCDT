<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $allPetugas = Petugas::all();
        return view('petugas.index', compact('allPetugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:petugas,nip',
            'pangkat' => 'required',
            'jabatan' => 'required',
        ]);

        Petugas::create($request->all());

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil disimpan!');
    }

    public function cetak($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.cetak', compact('petugas'));
    }
}