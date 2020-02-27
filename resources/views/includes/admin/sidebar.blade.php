<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
            <a href="{{route('dashboard')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li>
          <a href="{{route('karyawan.index')}}">
            <i class="fa fa-users"></i> <span>Data Karyawan</span>
          </a>
        </li>

        <li>
            <a href="{{route('jabatan.index')}}">
              <i class="fa fa-briefcase"></i> <span>Jabatan</span>
            </a>
        </li>
    
        <li>
            <a href="{{route('status.index')}}">
              <i class="fa fa-pencil-square-o"></i> <span>Status</span>
            </a>
        </li>
    
        <li>
            <a href="{{route('pendidikan.index')}}">
              <i class="fa fa-graduation-cap"></i> <span>Pendidikan</span>
            </a>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
</aside>