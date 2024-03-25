<?php

namespace App\Http\Controllers;

use App\Models\pendidikan;
use Illuminate\Http\Request;

class Pendidikancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendidikan::all();

        return view('admin.pendidikan.index',[
         'data'=>$data
      ]);
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('admin.pendidikan.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pendidikan::create([
            'tahun_masuk'=> $request->tahun_masuk,
            'tahun_selesai'=> $request->tahun_selesai,
            'hari'=> $request->hari,
            'instusi'=> $request->instusi,
            'perusahan'=> $request->perusahan,
            'jurusan'=> $request->jurusan,


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
