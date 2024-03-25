<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::orderBy('id', 'DESC')->get();
        return view('admin.experience.index', [
            'experience' => $experience,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'pengalaman' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $pengalaman = $request->input('pengalaman');
        $tahun = $request->input('tahun');

        // Create a new About model instance
        Experience::create([
            'pengalaman' => $pengalaman,
            'tahun' => $tahun,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('experience.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $experiences = Experience::find($id);
        return view('admin.experience.edit', [
            'experiences' => $experiences
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = Experience::find($id);

        $this->validate($request, [
            'pengalaman' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $pengalaman = $request->input('pengalaman');
        $tahun = $request->input('tahun');


        $data->update([
            'pengalaman' => $pengalaman,
            'tahun' => $tahun,
        ]);

        return redirect()->route('experience.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Experience::find($id)->delete();

        return redirect()->route('experience.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
