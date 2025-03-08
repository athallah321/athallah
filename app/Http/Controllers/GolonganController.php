<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golongan = Golongan::all();
        return view('golongans.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('golongans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_golongan' => 'required|unique:golongan|max:10',
            'nama_golongan' => 'required|max:50',
        ]);

        Golongan::create($request->all());
        return redirect()->route('golongans.index')->with('success', 'Golongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongans.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_golongan' => 'required|max:10|unique:golongan,kode_golongan,'.$id,
            'nama_golongan' => 'required|max:50',
        ]);

        $golongan = Golongan::findOrFail($id);
        $golongan->update($request->all());
        return redirect()->route('golongans.index')->with('success', 'Golongan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();
        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus.');
    }
}
