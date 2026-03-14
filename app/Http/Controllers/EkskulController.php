<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $ekskuls = Ekskul::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama_ekskul', 'like', '%' . $search . '%')
                        ->orWhere('pembina', 'like', '%' . $search . '%')
                        ->orWhere('jadwal', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.ekskuls.index', compact('ekskuls', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ekskuls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Ekskul::create($validated);

        return redirect()->route('admin.ekskuls.index')->with('success', 'Data ekskul berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekskul $ekskul)
    {
        return view('admin.ekskuls.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekskul $ekskul)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $ekskul->update($validated);

        return redirect()->route('admin.ekskuls.index')->with('success', 'Data ekskul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekskul $ekskul)
    {
        $ekskul->delete();

        return redirect()->route('admin.ekskuls.index')->with('success', 'Data ekskul berhasil dihapus.');
    }
}
