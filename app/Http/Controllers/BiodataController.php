<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodatas = Biodata::orderBy('id', 'DESC')->get();
        return view('admin.biodata.index', [
            'biodatas' => $biodatas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email|unique:biodatas,email', // Ensures unique email
            'alamat' => 'required|string',
            'jurusan' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // Extract data
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $jurusan = $request->input('jurusan');
        $foto = $request->file('foto');

        // Store the image (using Laravel's Storage facade)
        $foto->storeAs('/gambar/foto_biodata/', $foto->hashName());
        // Create a new Biodata model instance
        Biodata::create([
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'jurusan' => $jurusan,
            'foto' => $foto->hashName(),
        ]);

        // Save the new biodata and handle potential errors
        // $biodata->save();

        // Flash a success message to the session and redirect
        return redirect()->route('biodata.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('admin.biodata.edit', [
            'biodata' => $biodata
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Biodata::find($id);

        // Melakukan Validasi Data
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $jurusan = $request->input('jurusan');
        $foto = $request->file('foto');

        if ($foto) {
            //upload image
            $foto->storeAs('/gambar/foto_biodata/', $foto->hashName());

            // Hapus Gambar lama
            Storage::exists('/gambar/foto_biodata/' . $data->foto);
            Storage::delete('/gambar/foto_biodata/' . $data->foto);

            $data->update([
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'jurusan' => $jurusan,
                'foto'     => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'jurusan' => $jurusan,
            ]);
        }
        return redirect()->route('biodata.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Biodata::find($id);

        // Hapus Gambar lama
        Storage::exists('/gambar/foto_biodata/' . $data->foto);
        Storage::delete('/gambar/foto_biodata/' . $data->foto);

        // Hapus modul dari database
        $data->delete();

        return redirect()->route('biodata.index')
            ->with('Success', 'Biodata deleted successfully');
    }
}
