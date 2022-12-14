@extends('admin.app')
@section('title','Tambah Jenis Kontak')
@section('content-title','Tambah Jenis Kontak')
@section('content')
{{-- 
<div class="row">
    <div class="col-5">
        <div class="alert alert-succes"></div>
    </div>
</div> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
<a href="{{route('jnsKontak.create')}}" class="btn btn-success">Tambah Data</a>
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">            
                    <thead>
                        <th>No.</th>
                        <th scope="col">Jenis Kontak</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        {{-- @dd($item) --}}
                        <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->jenis_kontak}}</td>
                        <td>
                            <a href="jnsKontak/{{$item->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{route('jnsKontak.destroy',$item->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection