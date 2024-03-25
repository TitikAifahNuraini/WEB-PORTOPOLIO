<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontaks = Kontak::orderBy('id', 'DESC')->get();
        return view('admin.kontak.index', [
            'kontaks' => $kontaks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontak.create');
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'nomor_hp' => 'required|string',
            'email' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        // Extract data
        $nomor_hp = $request->input('nomor_hp');
        $email = $request->input('email');
        $lokasi = $request->input('lokasi');

        // Create a new About model instance
        Kontak::create([
            'nomor_hp' => $nomor_hp,
            'email' => $email,
            'lokasi' => $lokasi,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('kontak.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kontak = Kontak::find($id);
        return view('admin.kontak.edit', [
            'kontak' => $kontak
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Kontak::find($id);

        $this->validate($request, [
            'nomor_hp' => 'required|string',
            'email' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        // Extract data
        $nomor_hp = $request->input('nomor_hp');
        $email = $request->input('email');
        $lokasi = $request->input('lokasi');


        $data->update([
            'nomor_hp' => $nomor_hp,
            'email' => $email,
            'lokasi' => $lokasi,
        ]);

        return redirect()->route('kontak.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kontak::find($id)->delete();

        return redirect()->route('kontak.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
