@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Form Tambah Data Status</h3>
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
          <form action="{{route('status.store')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="nama_status">Nama Status</label>
                <select class="form-control" name="nama_status">
                  <option>--pilih status--</option>
                  <option value="KARYAWAN">KARYAWAN</option>
                  <option value="KONTRAK">KONTRAK</option>
                  <option value="MAGANG">MAGANG</option>
                </select>
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