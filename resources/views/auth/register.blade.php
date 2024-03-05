<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo1.png')}}"> 
  <title>{{ config('app.name') }} | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2-bootstrap-5-theme.min.css')}}"/>
</head>
<body class="hold-transition login-page">
    <div class="login-box" style="width: 70%;">
    <!-- /.login-logo -->
        <div class="card card-outline card-danger " >
            <div class="card-header text-center">
                <a href="#" class="h1">REGISTRASI <b>Nippon</b></a>
            </div>
            <!-- CARD BODY  -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" style="width: 100%;">
                        <div class="alert alert-info" role="alert">
                            <div class="text-center"><strong>STEP REGISTRASI :</strong></div>
                            <p>
                                1. Lengkapi semua isian form di bawah ini.<br>
                                2. Setelah semua form sudah terisi silahkan centang persetujuan tanggung jawab. <br>
                                3. Tekan tombol register untuk meregistrasi akun Anda. <br>
                                4. Hubungi Administrator untuk aktivasi akun (apabila dalam 1X24 jam akun anda belum aktif).  
                            </p>
                        </div>
                    
                    </div>
                    <div class="col-sm-12 row">

                        <div class="col-sm-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf   
                             <!-- Name -->
                            <div class="input-group mb-3">
                                <x-text-input id="name" class="form-control" type="text" 
                                name="name" :value="old('name')" placeholder="Nama Lengkap"
                                 required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                                </div>
                            </div>
    
                            <!-- Email -->
                                @if($errors->first('email')=='validation.unique')
                                    Email Telah Terdaftar
                                @else
                                    {{ $errors->first('email') }}
                                @endif
                            <div class="input-group mb-3">
                                <input id="email" class="form-control" type="email" placeholder="Email Address"
                                name="email" value="{{ old('email') }}" required autofocus autocomplete="email" />
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <error :messages="$errors->get('email')" class="mt-2" />                            
                            </div>

                            <!-- Telepon -->
                            <div class="input-group mb-3">
                                <x-text-input id="no_telp" class="form-control" type="text" 
                                name="no_telp" :value="old('no_telp')" placeholder="No. Telepon / HP"
                                 required autofocus autocomplete="no_telp" />
                                <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                                </div>
                            </div>
    
                             <!-- Password -->
                            @if($errors->first('password')=='validation.min.string')
                                Password Minimal 8 Karakter
                            @elseif($errors->first('password')=='validation.confirmed')
                                Password Harus Sama
                            @else
                                {{ $errors->first('password') }}
                            @endif
                            <div class="input-group mb-3">
                                <input id="password" class="form-control"
                                        type="password"
                                        name="password" placeholder="Password"
                                        required autocomplete="new-password" />
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                                <error :messages="$errors->get('password')" class="mt-2" />
                            </div>
    
                            <!-- Confirm Password -->
                            @if($errors->first('password')=='validation.confirmed')
                                Password Harus Sama
                            @endif
                            
                            <div class="input-group mb-3">
                                <input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" placeholder="Konfirmasi Password"
                                        required autocomplete="new-password" />
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <!-- NIK -->
                            <div class="input-group mb-3">
                                <x-text-input id="nik" class="form-control" type="text" 
                                name="nik" :value="old('nik')" placeholder="REG ID"
                                 required autofocus autocomplete="nik" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fas fa-address-book"></span>
                                </div>
                            </div>
                            <!-- Depo -->
                            <div class="input-group mb-3">
                                <select name="depo_id" id="depo_id" class="form-control select2" 
                                    style="font-size:12px;" required autofocus autocomplete="depo_id" auto>
                                </select>
                                <x-input-error :messages="$errors->get('depo_id')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fas fa-city"></span>
                                </div>
                            </div>
                            <!-- Departemen -->
                            <div class="input-group mb-3">
                                <select name="dept_id" id="dept_id" class="form-control select2" 
                                    style="font-size:12px;" required autofocus autocomplete="dept_id">                                    
                                </select>
                                <x-input-error :messages="$errors->get('dept_id')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fa fa-network-wired"></span>
                                </div>
                            </div>
                            <!-- Jabatan -->
                            <div class="input-group mb-3">
                                <select name="jabatan_id" id="jabatan_id" class="form-control select2" 
                                    style="font-size:12px;" required autofocus autocomplete="jabatan_id">                                    
                                </select>
                                <x-input-error :messages="$errors->get('jabatan_id')" class="mt-2" />
                                <div class="input-group-text">
                                <span class="fa fa-briefcase"></span>
                                </div>
                            </div>
    
                            
                        </div>
                    </div>              

                </div>   
                <br>        
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <input type="checkbox" id="toggle"/>
                        <span style="font-size:14px;">Saya menyetujui dan akan bertanggung jawab atas akun ini sesuai dengan ketentuan perusahaan.</span>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" id="submit_button" class="btn btn-primary hidden-xs" disabled>Register</button>
                        <!-- <button type="submit" id="submit_button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Register</button> -->
                    </form>
                    </div>
                </div>          
                
                           
                <p class="mb-0 text-center">
                    Sudah Memiliki Akun?<a href="{{ route('login') }}" class="text-center">Login</a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.min.js') }}"></script>
<script type="text/javascript">
        $('#toggle').click(function () {
            if ($(this).is(':checked')) {
                $('#submit_button').removeAttr('disabled');
            } else {
                $('#submit_button').attr('disabled', true); //disable input
            }
        });
 

$(function() {

    $("#depo_id").select2({
        placeholder: 'Pilih Depo ...',        
        theme: "bootstrap-5",
                ajax: {
                    url: '{{ route('getdepo') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
    });   

    $("#dept_id").select2({
        placeholder: 'Pilih Departemen..',
        theme: "bootstrap-5",
        ajax: {
                    url: '{{ route('getdepartemen') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
    });

    $("#jabatan_id").select2({
        placeholder: 'Pilih Jabatan ...',
        theme: "bootstrap-5",
    });
    
    $("#dept_id").change(function(){
        $(".dept_id-reset option").remove();

        let dept_id = $(this).val();
        if(dept_id !== undefined){
            var url = "{{ route('getjabatan', ":dept_id") }}";
            url     = url.replace(':dept_id', dept_id);
            
            $("#jabatan_id").select2({
                placeholder: 'Pilih Jabatan ...',
                theme: "bootstrap-5",
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            });
        }
    });
});
</script>
<script>
  // Deteksi apakah tema gelap diaktifkan pada browser
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  
  // Fungsi untuk menetapkan tema AdminLTE berdasarkan preferensi tema
  function setAdminLTEDarkMode() {
    const body = document.body;

    if (prefersDarkScheme.matches) {
      // Aktifkan mode gelap
      body.classList.add('dark-mode');
    } else {
      // Nonaktifkan mode gelap
      body.classList.remove('dark-mode');
    }
  }

  // Inisialisasi pada saat halaman dimuat
  document.addEventListener('DOMContentLoaded', () => {
    setAdminLTEDarkMode();
  });

  // Pantau perubahan preferensi tema
  prefersDarkScheme.addListener(setAdminLTEDarkMode);
</script>
</body>
</html>
