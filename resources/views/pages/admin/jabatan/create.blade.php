@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Form Tambah Data Jabatan</h3>
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
          <form action="{{route('jabatan.store')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" placeholder="masukan data..." class="form-control" value="{{old('nama_jabatan')}}">
              </div>
              <button type="submit" class="btn btn-success">
                <i class="glyphicon glyphicon-floppy-saved">Simpan</i>
              </button>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
@endsection