@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Status
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Status</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <a href="{{route('status.create')}}" class="btn btn-success" style="margin-bottom: 20px">
                <i class="fa fa-plus">Tambah Data</i>
            </a>
                <table id="data" class="table table-bordered" width="100%" cellspacing='0'>
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($status as $key => $item)
                      <tr>
                          <td>{{$key + 1}}</td>
                          <td>
                            @if ($item->nama_status == "KARYAWAN")
                                <span class="label label-primary">KARYAWAN</span>
                            @elseif ($item->nama_status == "KONTRAK")
                                <span class="label label-success">KONTRAK</span>
                            @else
                                <span class="label label-warning">MAGANG</span>
                            @endif
                          </td>
                          <td class="text-center">
                              <a href="{{route('status.edit', $item->id)}}" class="btn btn-primary">
                                  <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{route('status.destroy', $item->id)}}" method="post" onclick="return confirm('Hapus Data ?')">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>
                    @empty
                      <tr>
                          <td colspan="3" class="text-center">Data Kosong</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection