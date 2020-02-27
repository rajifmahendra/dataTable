@extends('layouts.admin')

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Status <b>{{$karyawan->nama}}</b></h3>
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
          <form action="{{route('karyawan.update', $karyawan->id)}}" method="post">
            @method('put')
            @csrf
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="masukan data..." class="form-control" value="{{$karyawan->nama}}">
              </div>

              <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="masukan data..." class="form-control">{{$karyawan->alamat}}</textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="umur">Umur</label>
                <input type="text" name="umur" placeholder="masukan data..." class="form-control" value="{{$karyawan->umur}}">
              </div>

              <div class="form-group col-md-6">
                <label for="nama">Jender</label>
                <select class="form-control" name="jender">
                  <option>{{$karyawan->jender}}</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" placeholder="masukan data..." class="form-control" value="{{$karyawan->no_tlp}}">
              </div>

              <div class="form-group col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" placeholder="masukan data..." class="form-control" value="{{$karyawan->tgl_lahir}}">
              </div>

              <div class="form-group col-md-6">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" name="jabatan_id">
                  <option>--pilih jabatan--</option>
                  @foreach ($jabatan as $item)
                    <option value="{{$item->id}}" 
                      {{isset($karyawan) && $karyawan->jabatan_id == $item->id 
                      ? 'selected' : ''}}
                      >
                    {{$item->nama_jabatan}}
                    </option>   
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select class="form-control" name="status_id">
                  <option>--pilih status--</option>
                  @foreach ($status as $item)
                    <option value="{{$item->id}}"
                      {{isset($karyawan) && $karyawan->status_id == $item->id
                      ? 'selected' : ''}}  
                      >
                      {{$item->nama_status}}
                    </option>  
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control" name="pendidikan_id">
                  <option>--pilih pendidikan--</option>
                  @foreach ($pendidikan as $item)
                    <option value="{{$item->id}}"
                      {{isset($karyawan) && $karyawan->pendidikan_id == $item->id
                      ? 'selected' : ''}}  
                      >
                      {{$item->pendidikan}}
                    </option>  
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="tgl_masuk">Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" placeholder="masukan data..." class="form-control" value="{{$karyawan->tgl_masuk}}">
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