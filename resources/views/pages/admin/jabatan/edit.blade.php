@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Jabatan <b>{{$jabatan->nama_jabatan}}</b></h3>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <form action="{{route('jabatan.update', $jabatan->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" class="form-control" value="{{$jabatan->nama_jabatan}}">
              </div>
              <button type="submit" class="btn btn-success">
                <i class="fa fa-edit">Edit</i>
              </button>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
@endsection