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

<a href="{{route('jnskontak.create')}}" class="btn btn-success">Tambah Data</a>
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb">
            <div class="card-header py-4">
                <h6 class="m-0 font-weight-bold text-primary">Jenis Kontak</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th scope="col">Jenis Kontak</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->tipe_kontak}}</td>
                        <td>
                            <a href="jnskontak/{{$item->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{route('jnskontak.destroy',$item->id)}}" method="POST">
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