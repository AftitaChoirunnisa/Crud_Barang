<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('foto') ? $request->file('foto')->store('barang', 'public') : null;

        Barang::create($request->only(['kode', 'nama_barang', 'deskripsi', 'harga_satuan', 'jumlah']) + ['foto' => $path]);

        return redirect()->route('barang.index')->with('success', 'Barang ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }
            $barang->foto = $request->file('foto')->store('barang', 'public');
        }

        $barang->update($request->only(['nama_barang', 'deskripsi', 'harga_satuan', 'jumlah']) + ['foto' => $barang->foto]);

        return redirect()->route('barang.index')->with('success', 'Barang diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang dihapus.');
    }
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }
}
