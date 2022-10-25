@extends('admin.app')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project')
@section('content')

<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (count($errors)> 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form method="POST" enctype="multipart/form-data"action="{{route ('masterproject.update',['masterproject'=>$data->id]) }}">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="nama_projek">Nama Project</label>
                    <input type="hidden" name="id_siswa" value="{{ $data->id_siswa }}">
                    <input type="text" class="form-control" id="nama_projek" name='nama_projek' value="{{$data->nama_projek}}" >
                </div>                   
                <div class = "form-group">
                    <label for="tanggal">tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value = "{{$data->tanggal}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{$data->deskripsi}}" >
                </div> 
                <div class="form-group">
                    <label for="Nama">Foto Project</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                    <img src="{{asset('/Template/img/'.$data->foto)}}" width="300" class="img-thumbnail" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
            </div>
         </div>
    </div>
</div>

@endsection