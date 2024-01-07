<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel 'branches'
        $branches = Branch::all();

        // Mengirim data ke view untuk ditampilkan
        return view('branch.index', ['branches' => $branches]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            // Sesuaikan dengan validasi untuk kolom lain sesuai dengan struktur tabel 'branches'
        ]);

        // Simpan data ke database
        $branch = new Branch;
        $branch->name = $request->name;
        // Set nilai kolom lain sesuai dengan struktur tabel 'branches'
        $branch->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('branch.index')->with('success', 'Branch created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            // Sesuaikan dengan validasi untuk kolom lain sesuai dengan struktur tabel 'branches'
        ]);

        // Mengambil data branch berdasarkan ID
        $branch = Branch::findOrFail($id);

        // Memperbarui nilai kolom dengan data yang baru
        $branch->update([
            'name' => $request->name,
            // Perbarui kolom lain sesuai dengan struktur tabel 'branches'
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('branch.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy($id)
    {
        // Mengambil data branch berdasarkan ID
        $branch = Branch::findOrFail($id);

        // Menghapus data branch
        $branch->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('branch.index')->with('success', 'Branch deleted successfully.');
    }
}
