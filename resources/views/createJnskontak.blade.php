@extends('admin.app')
@section('title','Create Jenis Kontak')
@section('content-title','Create Jenis Kontak')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-shadow mb-4">
                <div class="card-body">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="d-inline" action="{{route('jnskontak.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="tipe_kontak">Jenis Kontak</label>
                            <input type="text" class="form-control" id="tipe_kontak" name="tipe_kontak" value="{{old('tipe_kontak')}}">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="simpan">
                            <a href="{{route('jnskontak.index')}}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection