@extends('admin.app')
@section('title','Edit Jenis Kontak')
@section('content-title','Edit Jenis Kontak')
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
                <form class="d-inline"  method="POST" action="{{route('jnsKontak.update' , ['jnsKontak' => $data->id])}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="jenis_kontak">Jenis Kontak</label>
                        <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak" value="{{$data->jenis_kontak}}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan">
                        <a href="{{route('jnsKontak.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection