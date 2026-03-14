<?php

namespace App\Http\Controllers;

use App\Models\VisionMission;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    /**
     * Display vision-mission on frontend page.
     */
    public function publicIndex()
    {
        $visionMission = VisionMission::latest()->first();
        $schoolProfile = SchoolProfile::latest()->first();

        return view('vision-mission', compact('visionMission', 'schoolProfile'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visionMissions = VisionMission::latest()->get();

        return view('admin.vision_mission.index', compact('visionMissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vision_mission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        VisionMission::create($validated);

        return redirect()->route('admin.vision-mission.index')->with('success', 'Visi misi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisionMission $visionMission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisionMission $visionMission)
    {
        return view('admin.vision_mission.edit', compact('visionMission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisionMission $visionMission)
    {
        $validated = $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        $visionMission->update($validated);

        return redirect()->route('admin.vision-mission.index')->with('success', 'Visi misi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisionMission $visionMission)
    {
        $visionMission->delete();

        return redirect()->route('admin.vision-mission.index')->with('success', 'Visi misi berhasil dihapus.');
    }
}
