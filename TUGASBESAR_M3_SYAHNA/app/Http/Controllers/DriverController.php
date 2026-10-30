<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_sim' => 'required|string|max:50',
            'exp_sim' => 'required|date',
            'kontak' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'catatan' => 'nullable|string',
        ]);

        $validated['created_at'] = now();

        Driver::create($validated);

        return redirect()->route('drivers.index')
            ->with('success', 'Data driver berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $driver = Driver::findOrFail($id);

        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, string $id)
    {
        $driver = Driver::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_sim' => 'required|string|max:50',
            'exp_sim' => 'required|date',
            'kontak' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'catatan' => 'nullable|string',
        ]);

        $driver->update($validated);

        return redirect()->route('drivers.index')
            ->with('success', 'Data driver berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'Data driver berhasil dihapus!');
    }
}
