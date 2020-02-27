@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Status <b>{{$status->nama_status}}</b></h3>
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
          <form action="{{route('status.update', $status->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <label for="nama_status">Nama Status</label>
                <select class="form-control" name="nama_status">
                  <option >{{$status->nama_status}}</option>
                  <option value="KARYAWAN">KARYAWAN</option>
                  <option value="KONTRAK">KONTRAK</option>
                  <option value="MAGANG">MAGANG</option>
                </select>
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