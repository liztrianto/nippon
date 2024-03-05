<?php
   
    use App\Models\Signboard;
    // use Auth; 
    use App\User; 
    // use DB; 

    $auth = Auth::user();
    $signboard = 0;
    $sign = 0;
    $jumlah_approve = 0;
    $control_signboard = 0;
    $jumlah_control = 0;
  ?>


    @can('approval-signboard')
    <?php
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
    ?>
    @endcan

    @can('controller-signboard')
    <?php
      $sign = DB::table('signboards')
          ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
          ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
          ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
          ->select([
              'signboards.*'
          ])
          ->where('model.id','=',$auth->id)
          ->where('signboards.approve','=',1)
          ->get();
    ?>
    @endcan


    <?php
    if($signboard!=null){
      $jumlah_approve = count($signboard);
    }
    if($sign!=null){
      $jumlah_control = count($sign);
    }



    // $c = User::where(['active' => 3])->get();
    // $jumlah_controller = count($c);

    // $st = Surat_Tugas::where(['approval' => 1])->get();
    // $jml_st = count($st);

    // $capa = CAPA::where(['verifikator_id' => $auth->id, 'status' => 1])->get();
    $jumlah_notif = $jumlah_approve + $jumlah_control;
?> 

<nav class="main-header navbar navbar-expand navbar-white ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if($jumlah_notif!=null)
          <span class="badge badge-danger navbar-badge"> {{ $jumlah_notif }} </span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $jumlah_notif }} Notifications</span>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a> -->
          @can('approval-signboard')
            @if($jumlah_approve!=null)
            <div class="dropdown-divider"></div>
            <a href="{{ route('approval.index') }}" class="dropdown-item">
              <i class="fas fa-marker mr-2"></i> {{ $jumlah_approve }} Approval Signboard
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            @endif
          @endcan 

          @can('controller-signboard')
            @if($jumlah_control!=null)
            <div class="dropdown-divider"></div>
            <a href="{{ route('controller.index') }}" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> {{ $jumlah_control }} Controller Signboard
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            @endif
          @endcan 
          <!-- @if($jumlah_notif!=null)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          @endif -->
        </div>
      </li>    
      

      <!-- DROPDOWN PROFILE  -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-tie fa-lg"></i> {{ Auth()->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- <div class="col-md-12"> -->
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{ Auth()->user()->name }}</h3>
                
                @if(!empty(Auth()->user()->getRoleNames()))
                        <small>
                        @foreach(Auth()->user()->getRoleNames() as $role)
                            <!-- <u>{{ $role }}</u>&nbsp; -->
                            <h5 class="widget-user-desc">{{ $role }}</h5>
                            
                            <!-- <h5 class="widget-user-desc">{{ Auth()->user()->nama_departemen }}</h5> -->
                        @endforeach
                        </small>
                    @endif
              </div>
              <div class="widget-user-image">
                <?php $image = Auth::user()->image; ?>
                    @if(!empty($image))
                        <img src="{{ asset('images/profile').'/'.$image }}" 
                        class="img-circle elevation-2" alt="User Image" height="150" width="150">
                    @else
                        <img src="{{ asset('images/profile/default-profile.jpg') }}" 
                        class="img-circle" alt="User Image" height="190" width="190">
                    @endif
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <a href=" {{ route('profile.edit') }} " class="btn btn-default btn-flat">
                        <i class="fas fa-user"></i> Profile</a>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="description-block">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="btn btn-block btn-danger" href="{{ route('logout') }}">
                            Logout
                            <i class="fas fa-right-from-bracket"></i> 
                          </button>
                      </form>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          <!-- </div> -->
         
          <!-- <div class="dropdown-divider"></div> -->
          
          
          
        </div>
      </li>  

    </ul>
  </nav>