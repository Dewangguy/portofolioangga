@extends('admin.app')
@section('title', 'Edit Siswa')
@section('content-title', 'Edit Siswa')
@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6> --}}
                    {{-- <a class="btn btn-success" href="{{ Route('mastersiswa.create') }}"> Tambah Data</a> --}}
                </div>
                <div class="card-body">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ Route('mastersiswa.update', ['mastersiswa' => $siswa->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                        <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value = "{{$siswa->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" name="jk" id="jk" value = "{{$siswa->jk}}" required>
                            <option value="Laki - laki" @if($siswa->jk == 'laki-laki') selected @endif>Laki - laki</option>
                            <option value="Perempuan" @if($siswa->jk == 'perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="email" id="Email" value = "{{$siswa->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value = "{{$siswa->alamat}}" required>
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" name="about" id="about" required>{{$siswa->about}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" name="foto" id="foto">
                        <img src="{{ asset('/Template/img/'.$siswa->foto) }}" width="300" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ Route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

@endsection