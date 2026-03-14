<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolProfiles = SchoolProfile::latest()->get();

        return view('admin.school_profile.index', compact('schoolProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school_profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sejarah_sekolah' => 'required|string',
            'poin_value' => 'required|string',
            'rules' => 'required|string',
        ]);

        SchoolProfile::create($validated);

        return redirect()->route('admin.school-profile.index')->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolProfile $schoolProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolProfile $schoolProfile)
    {
        return view('admin.school_profile.edit', compact('schoolProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolProfile $schoolProfile)
    {
        $validated = $request->validate([
            'sejarah_sekolah' => 'required|string',
            'poin_value' => 'required|string',
            'rules' => 'required|string',
        ]);

        $schoolProfile->update($validated);

        return redirect()->route('admin.school-profile.index')->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolProfile $schoolProfile)
    {
        $schoolProfile->delete();

        return redirect()->route('admin.school-profile.index')->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
