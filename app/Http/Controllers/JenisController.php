<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenis_kontak::all();
        $siswa = Siswa::all();
        // dd($data);
        return view('admin.jnsKontak', compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createJnskontak');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu bang'
        ];
        $validated = $request->validate([
            "jenis_kontak" => "required"
        ],$message);
        Jenis_kontak::create($validated);
        return redirect()->route('jnsKontak.index');
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
        $data = Jenis_kontak::find($id);
        return view('editJnskontak', compact('data'));
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
        $message = [
            'required' => ':attribute harus diisi dulu bang'
        ];
        
        $this->validate($request,[
            'jenis_kontak'=>'required',
        ],$message);

        $jenis = Jenis_kontak::find($id);
        $jenis->jenis_kontak = $request->jenis_kontak;
        $jenis->update();
        return redirect('/jnsKontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenis_kontak::find($id)->delete();
        return redirect('/jnsKontak');
    }
}