<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Museum;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function index()
    {
        $stats = [
            'total_museums' => Museum::count(),
            'free_museums' => Museum::where('harga_tiket', 'like', '%gratis%')->count(),
            'paid_museums' => Museum::where('harga_tiket', 'not like', '%gratis%')
                                     ->whereNotNull('harga_tiket')
                                     ->count(),
        ];

        $recent_museums = Museum::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_museums'));
    }

    // List museums
    public function museums()
    {
        $museums = Museum::orderBy('nama_museum')->paginate(10);
        return view('admin.museums.index', compact('museums'));
    }

    // Create museum form
    public function createMuseum()
    {
        return view('admin.museums.create');
    }

    // Store museum
    public function storeMuseum(Request $request)
    {
        $request->validate([
            'nama_museum' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jam_operasional' => 'nullable|string',
            'harga_tiket' => 'nullable|string',
            'foto_url' => 'nullable|url',
        ]);

        Museum::create($request->all());

        return redirect()->route('admin.museums')->with('success', 'Museum berhasil ditambahkan!');
    }

    // Edit museum form
    public function editMuseum($id)
    {
        $museum = Museum::findOrFail($id);
        return view('admin.museums.edit', compact('museum'));
    }

    // Update museum
    public function updateMuseum(Request $request, $id)
    {
        $request->validate([
            'nama_museum' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $museum = Museum::findOrFail($id);
        $museum->update($request->all());

        return redirect()->route('admin.museums')->with('success', 'Museum berhasil diupdate!');
    }

    // Delete museum
    public function deleteMuseum($id)
    {
        $museum = Museum::findOrFail($id);
        $museum->delete();

        return redirect()->route('admin.museums')->with('success', 'Museum berhasil dihapus!');
    }
}
