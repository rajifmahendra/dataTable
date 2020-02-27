@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Form Tambah Data Pendidikan</h3>
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
        <div class="col-md-12">
          <form action="{{route('karyawan.store')}}" method="post">
              @csrf
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="masukan data..." class="form-control" value="{{old('nama')}}">
              </div>

              <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="masukan data..." class="form-control" value="{{old('alamat')}}"></textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="umur">Umur</label>
                <input type="text" name="umur" placeholder="masukan data..." class="form-control" value="{{old('umur')}}">
              </div>

              <div class="form-group col-md-6">
                <label for="nama">Jender</label>
                <select class="form-control" name="jender">
                  <option>--pilih jender--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" placeholder="masukan data..." class="form-control" value="{{old('no_tlp')}}">
              </div>

              <div class="form-group col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" placeholder="masukan data..." class="form-control" value="{{old('tgl_lahir')}}">
              </div>

              <div class="form-group col-md-6">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" name="jabatan_id">
                  <option>--pilih jabatan--</option>
                  @foreach ($jabatan as $item)
                    <option value="{{$item->id}}">{{$item->nama_jabatan}}</option>   
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select class="form-control" name="status_id">
                  <option>--pilih status--</option>
                  @foreach ($status as $item)
                    <option value="{{$item->id}}">{{$item->nama_status}}</option>  
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control" name="pendidikan_id">
                  <option>--pilih pendidikan--</option>
                  @foreach ($pendidikan as $item)
                    <option value="{{$item->id}}">{{$item->pendidikan}}</option>  
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="tgl_masuk">Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" placeholder="masukan data..." class="form-control" value="{{old('tgl_masuk')}}">
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