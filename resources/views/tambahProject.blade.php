@extends('admin.app')
@section('title','create project')
@section('content-title','create project')
@section('content')
<div class="row">
    <div class = "col-lg 12">
        <div class = "card shadow mb-4">
            <div class = "card header py-3">
            </div>

            <div class="card-body">
                @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors -> all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
                <form method ="POST" enctype ="multipart/form-data" action="{{route('masterproject.store')}}">
                    @csrf
                    {{-- <div class = "form-group">
                        <label for="id_siswa"></label>
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value = "{{ old('id_siswa')}} ">
                    </div> --}}
                    <input type="hidden" name="id_siswa" value="{{$siswa->id}}">

                    <div class = "form-group">
                        <label for="nama_projek">nama project</label>
                        <input type="text" class="form-control" id="nama_projek" name="nama_projek" value = "{{ old('nama_project')}} ">
                    </div>
                    <div class = "form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value = "{{ old('tanggal')}}">
                    </div>
                    <div class = "form-group">
                        <label for="deskripsi">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value = "{{ old('deskripsi')}}">
                    </div>
                    <div class = "form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-control-file" id="foto"
                         name="foto" value = "{{ old('foto')}}">
                    </div>
                    <div class="form-group">
                        <input type ="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection