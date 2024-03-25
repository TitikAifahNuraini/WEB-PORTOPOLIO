<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengalaman = Pengalaman::orderBy('id', 'DESC')->get();
        return view('admin.pengalaman.index', [
            'pengalaman' => $pengalaman,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengalaman.create', [
        ]);
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
        Pengalaman::create([
            'pengalaman' => $pengalaman,
            'tahun' => $tahun,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('pengalaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengalaman $id)
    {
        $pengalaman = Pengalaman::find($id);
        return view('admin.pengalaman.edit', [
            'pengalaman' => $pengalaman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Pengalaman::find($id);

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

        return redirect()->route('pengalaman.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengalaman $id)
    {
        Pengalaman::find($id)->delete();

        return redirect()->route('pengalaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
