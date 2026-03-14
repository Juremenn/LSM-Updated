<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $alumni = Alumni::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama_alumni', 'like', '%' . $search . '%')
                        ->orWhere('jurusan', 'like', '%' . $search . '%')
                        ->orWhere('pekerjaan', 'like', '%' . $search . '%')
                        ->orWhere('kontak', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.alumni.index', compact('alumni', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|digits:4|min:1950|max:' . date('Y'),
            'jurusan' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
        ]);

        Alumni::create($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumnus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumnus)
    {
        return view('admin.alumni.edit', ['alumniItem' => $alumnus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $validated = $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|digits:4|min:1950|max:' . date('Y'),
            'jurusan' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
        ]);

        $alumnus->update($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumnus)
    {
        $alumnus->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }
}
