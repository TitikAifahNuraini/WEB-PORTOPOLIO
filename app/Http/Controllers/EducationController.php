<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\pendidikan;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::orderBy('id', 'DESC')->get();
        return view('admin.pendidikan.index', [
            'educations' => $educations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendidikan.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'tahun_masuk' => 'required|string',
            'tahun_selesai' => 'required|string',
            'instusi' => 'required|string',
            'perusahan' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        // Extract data
        $tahun_masuk = $request->input('tahun_masuk');
        $tahun_selesai = $request->input('tahun_selesai');
        $instusi = $request->input('instusi');
        $perusahan = $request->input('perusahan');
        $jurusan = $request->input('jurusan');

        // Create a new About model instance
        Education::create([
            'tahun_masuk' => $tahun_masuk,
            'tahun_selesai' => $tahun_selesai,
            'instusi' => $instusi,
            'perusahan' => $perusahan,
            'jurusan' => $jurusan,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $educations = Education::find($id);
        return view('admin.pendidikan.edit', [
            'educations' => $educations
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Education::find($id);

        $this->validate($request, [
            'tahun_masuk' => 'required|string',
            'tahun_selesai' => 'required|string',
            'instusi' => 'required|string',
            'perusahan' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        // Extract data
        $tahun_masuk = $request->input('tahun_masuk');
        $tahun_selesai = $request->input('tahun_selesai');
        $instusi = $request->input('instusi');
        $perusahan = $request->input('perusahan');
        $jurusan = $request->input('jurusan');


        $data->update([
            'tahun_masuk' => $tahun_masuk,
            'tahun_selesai' => $tahun_selesai,
            'instusi' => $instusi,
            'perusahan' => $perusahan,
            'jurusan' => $jurusan,
        ]);

        return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Education::find($id)->delete();

        return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
