<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\Siswa;
use Illuminate\Http\Request;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Projek::all();
        $siswa = Siswa::all();
        return view('admin.masterproject',compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProject($id)
    {
        return view('tambahProject', [
            'siswa' => Siswa::find($id)
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
        $messages = [
            'required' => ':attribute harus diisi',
            'nama' => ':attribute minimal :min karakter',
            'max' => ':attribute max :max karakter',
            'numeric' => ':attribute harus angka',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,svg,png'

        ];
        $this->validate($request,[
            'id_siswa' => 'required',
            'nama_projek' => 'required|min:5|max:50',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:5',
            'foto' => 'required|required|mimes:jpg,jpeg,svg,png,gif,pdf',
        ],$messages);

        
        $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img/';
        $file->move ($tujuan_upload,$nama_file);
        Projek::create([
            'id_siswa' => $request->id_siswa,
            'nama_projek' => $request->nama_projek,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $nama_file
        ]);
        return redirect('masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id)->project()->get();
        return view('showproject',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Projek::find($id);
        return view('editproject', compact('data'));
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
            'required' => ':attribute harus diisi',
            'nama' => ':attribute minimal :min karakter',
            'max' => ':attribute max :max karakter',
            'numeric' => ':attribute harus angka',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,svg,png'

        ];
        $this->validate($request,[
            'id_siswa' => 'required|numeric',
            'nama_projek' => 'required|min:5|max:50',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:5',
            'foto' => 'mimes:jpg,jpeg,svg,png,gif,pdf',
        ],$messages);

        if($request->foto != ""){

            $project = Projek::find($id);
            file::delete('./template/img'.$project->foto);
            $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img';
        $file->move ($tujuan_upload,$nama_file);
        $project->id_siswa=$request->id_siswa;
        $project->nama_project=$request->nama_project;
        $project->tanggal=$request->tanggal;
        $project->deskripsi=$request->deskripsi;
        $project->foto=$nama_file;
        $project->update();
        return redirect('mastersiswa');
        }
        else{
            $project = Projek::find($id);
            $project->id_siswa=$request->id_siswa;
            $project->nama_projek=$request->nama_projek;
            $project->tanggal=$request->tanggal;
            $project->save();
            return redirect('masterproject');
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
        //
    }

    public function hapus($id)
    {
        $data=Projek::find($id)->delete();
        return redirect('masterproject');
    }
}
