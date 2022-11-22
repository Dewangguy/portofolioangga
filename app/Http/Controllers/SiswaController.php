<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max krakter',
            'numeric' => ':attribute angka cuy',
            'mimes' => ':attribute harus bertipe jpg,jpeg,png',
            'size' => 'file yang diupload maksimal : size'
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './Template/img';
        $file->move($tujuan_upload,$nama_file);

        //Proses insert database
        Siswa::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/mastersiswa');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        return view('showSiswa', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('editSiswa', compact('data'));
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
        $messages = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max krakter',
            'numeric' => ':attribute angka cuy',
            'mimes' => ':attribute harus bertipe jpg,jpeg,png',
            'size' => 'file yang diupload maksimal : size'
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto !=''){
            //dengan ganti foto
            
            //1. menghapus foto yang lama
            $siswa=Siswa::find($id);
            file::delete('./Template/img/'.$siswa->foto);
            
            //2. ambil informasi file yang diupload
            $file = $request->file('foto');
            //3. rename + ambil nama file
            $nama_file = time()."_".$file->getClientOriginalName();    
            //4. proses upload
            $tujuan_upload = './Template/img';
            $file->move($tujuan_upload,$nama_file);
            //5. menyimpan ke database
            $siswa=Siswa::find($id);
            $siswa->nama= $request->nama;
            $siswa->jk = $request->jk;
            $siswa->email= $request->email;
            $siswa->alamat= $request->alamat;
            $siswa->about= $request->about;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect ('mastersiswa');

        }else{
            //tanpa ganti foto
            $siswa=Siswa::find($id);
            $siswa->nama= $request->nama;
            $siswa->jk = $request->jk;
            $siswa->email= $request->email;
            $siswa->alamat= $request->alamat;
            $siswa->about= $request->about;
            $siswa->save();
            return redirect ('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
