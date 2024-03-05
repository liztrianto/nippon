<!-- untuk notifikasi  -->
<?php
   
    use App\Models\Signboard;
    use App\User; 

    $auth = Auth::user();

    $signboard = DB::table('signboards')
        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
        ->select([
            'signboards.*'
        ])
        ->where('model.id','=',$auth->id)
        ->where('signboards.approve','=',0)
        ->get();
    $jumlah_approve = count($signboard);

    $control = DB::table('signboards')
        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
        ->select([
            'signboards.*'
        ])
        ->where('model.id','=',$auth->id)
        ->where('signboards.approve','=',1)
        ->get();
    $jumlah_control = count($control);


?> 
<!-- end untuk notifikasi -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-danger">
      <img src="{{ asset('assets/images/Nippon-Paint-Favicon.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <!-- <img src="{{ asset('assets/images/Nippon-paint1.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><b>Nippon Aplication</b></span>
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php  $image = Auth::user()->image; ?>
            @if(!empty($image))
                <img src="{{ asset('images/profile').'/'.$image }}"  class="img-circle" alt="User Image">
            @else
                <img src="{{ asset('images/profile/default-profile.jpg') }}" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
        </div>
      </div>
      

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" 
        role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header bg-light">
           <b>MAIN NAVIGATION</b>
          </li>
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          @can('controller-signboard')
          <li class="nav-item">
            <a href="{{ route('controller.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Controller SignBoard
                <!-- <i class="fas fa-angle-left right"></i> -->
                <span class="badge badge-success right"> {{ $jumlah_control }} </span>
              </p>
            </a>
          </li>          
          @endcan 
          @can('vendor-signboard')
          <li class="nav-item">
            <a href="{{ route('vendor.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SignBoard
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-success right">9</span> -->
              </p>
            </a>
          </li>          
          @endcan 

          @can('signboard')
          <li class="nav-item">
            <a href="{{ route('signboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pengajuan SignBoard
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-success right">9</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/toko') }}" class="nav-link">
            <i class="nav-icon fas fa-landmark"></i>
              <p>
                Data Toko
              </p>
            </a>
          </li>
          @endcan 
          @can('approval-signboard')
          <li class="nav-item">
            <a href="{{ url('/approval') }}" class="nav-link">
              <!-- <i class="nav-icon fas fa-signature"></i> -->
              <i class="nav-icon fas fa-marker"></i>
              <!-- <i class="nav-icon fas fa-marker fa-bounce"></i> -->
              <p>
                Approval SignBoard
                @if($jumlah_approve!=null)
                  <span class="badge badge-success right"> {{ $jumlah_approve }} </span>
                @endif
              </p>
            </a>
          </li>          
          @endcan

          @can('master-data')
          <li class="nav-header bg-light"> <b>DATA MASTER</b> </li>
          <li class="nav-item">
            <a href="{{ url('/depo') }}" class="nav-link">
            <i class="nav-icon fas fa-city"></i>
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <p>
                Data Depo
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/departemen') }}" class="nav-link">
            <i class="nav-icon fas fa-network-wired"></i>
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <p>
                Data Departemen
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jabatan') }}" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <p>
                Data Jabatan
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          


          <li class="nav-header bg-light"> 
            <b>ADMINISTRATOR</b>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('users.index') }}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link">
                  <i class="fa fa-briefcase nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link">
                  <i class="fa fa-key nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>
            </ul>
          </li>  
          @endcan
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>