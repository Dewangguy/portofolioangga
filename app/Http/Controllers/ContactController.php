<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_kontak;
use App\Models\Siswa;
use App\Models\Kontak;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();
        return view('admin.masterkontak', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tambahContact", [
            'siswa' => siswa::all(),
            'jenis' => Jenis_kontak::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {

            $message = [
                'required' => ':attribute harus diisi dulu bang'
            ];
            $validated = $request->validate([
                "id_siswa" => "required",
                "id_jenis" => "required",
                "deskripsi" => "required",
            ],$message);
            Kontak::create($validated);
            return redirect()->route('masterkontak.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kontak::find($id);
        $jenis_kontak = jenis_kontak::find($id);
        return view ('editKontak', compact('data','jenis_kontak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontak::find($id)->delete();
        return redirect()->back();
    }
}
