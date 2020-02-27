@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Status
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Karyawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <a href="{{route('karyawan.create')}}" class="btn btn-success" style="margin-bottom: 20px">
                <i class="fa fa-plus">Tambah Data</i>
            </a>
                <table id="data" class="table table-bordered" width="100%" cellspacing='0'>
                  <thead>
                  <tr>
                    <th></th>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Jender</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                    {{-- <th class="text-center">Action</th> --}}
                  </tr>
                  </thead>
                  {{-- <tbody>
                    @forelse ($karyawan as $key => $item)
                      <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->jender}}</td>
                          <td>{{$item->no_tlp}}</td>
                          <td>{{$item->jabatan->nama_jabatan}}</td>
                          <td>
                            @if ($item->status->nama_status == "KARYAWAN")
                                <span class="label label-primary">KARYAWAN</span>
                            @elseif ($item->status->nama_status == "KONTRAK")
                                <span class="label label-success">KONTRAK</span>
                            @else
                                <span class="label label-warning">MAGANG<span>
                            @endif
                          </td>
                          <td>{{$item->tgl_masuk}}</td>
                          <td class="text-center">
                              <a href="{{route('karyawan.edit', $item->id)}}" class="btn btn-primary">
                                  <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{route('karyawan.destroy', $item->id)}}" method="post" onclick="return confirm('Hapus Data ?')">
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
                  </tbody> --}}
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

@push('css_childrow')
    <style>
        td.details-control {
          background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
          cursor: pointer;
        }
        tr.shown td.details-control {
          background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
        }
    </style>
@endpush

@push('childrow')
  <script>
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<th>Alamat </th>'+
                '<td>'+d.alamat+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Umur </th>'+
                '<td>'+d.umur+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Tanggal Lahir </th>'+
                '<td>'+d.tgl_lahir+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Pendidikan </th>'+
                '<td>'+d.pendidikan.pendidikan+'</td>'+
            '</tr>'+
            '<tr>'+
                `<td>
                    <a href="http://127.0.0.1:8000/admin/karyawan/${d.id}/edit" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="http://127.0.0.1:8000/admin/karyawan/`+d.id+`" method="post" onclick="return confirm('Hapus Data ?')">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>`+
                // '<td>'+d.pendidikan.pendidikan+'</td>'+
            '</tr>'+
        '</table>';
    }
    
    $(document).ready(function() {
        var table = $('#data').DataTable( {
            "data": @json($karyawan, JSON_PRETTY_PRINT),
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "id"},
                { "data": "nama" },
                { "data": "jender" },
                { "data": "no_tlp" },
                { "data": "jabatan.nama_jabatan" },
                { "data": "status.nama_status" },
                { "data": "tgl_masuk" },
                // { "defaultContent": `<a href="" class="btn btn-primary">
                //                   <i class="fa fa-edit"></i>
                //               </a>
                //               <form action="" method="post" onclick="return confirm('Hapus Data ?')">
                //                   @csrf
                //                   @method('delete')
                //                   <button class="btn btn-danger">
                //                       <i class="fa fa-trash"></i>
                //                   </button>
                //               </form>` },
            ],
            "order": [[1, 'asc']]
        } );
        
        // Add event listener for opening and closing details
        $('#data tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );
  </script>
@endpush