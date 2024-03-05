@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Dashboard
@endsection
    
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @can('approval-signboard')
        
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              
              <h3> {{ $jumlah_approve }} </h3>        
              
              
              <p>Pengajuan Sign Board</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-copy"></i> -->
              <i class="nav-icon fas fa-copy"></i>
            </div>
            <a href="{{ url('/approval') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endcan
        
        @can('controller-signboard')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> {{ $jumlah_control }} </h3>
              
              <p>Pengajuan Sign Board</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-copy"></i> -->
              <i class="nav-icon fas fa-copy"></i>
            </div>
            <a href="{{ route('controller.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endcan
        
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3>86<sup style="font-size: 20px"></sup></h3>

                <p>Data Toko</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-landmark"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
         
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection