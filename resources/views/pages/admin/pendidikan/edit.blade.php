@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Status <b>{{$pendidikan->pendidikan}}</b></h3>
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
          <form action="{{route('pendidikan.update', $pendidikan->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group">
                <label for="nama_status">Pendidikan</label>
                <select class="form-control" name="pendidikan">
                  <option >{{$pendidikan->pendidikan}}</option>
                  <option value="SMA/Sederajat">SMA/Sederajat</option>
                  <option value="S-1">S-1</option>
                  <option value="S-2">S-2</option>
                  <option value="S-3">S-3</option>
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