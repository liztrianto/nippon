<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo1.png')}}"> 
  <title>{{ config('app.name') }} | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Nippon</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
                @if ($errors->has('email'))
                    <span class="help-block text-danger text-center">
                        <strong >{{ $errors->first('email') }}</strong>
                    </span>
                    <br><br>
                @endif
                
        <div class="input-group mb-3">
            <!-- <label for="email" :value="__('Email')" /> -->
            <input id="email" class="form-control" type="email" placeholder="Email Address"
            name="email" :value="old('email')" required autofocus autocomplete="username" />
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            <error :messages="$errors->get('email')" class="mt-2" />
           
        </div>
        <!-- <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }} mb-3 ">
          <input type="email" name="email" class="form-control" placeholder="email" 
          value="{{ old('email') }}" autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
          
        </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif -->


        <div class=" input-group mb-3">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <input id="password" class=" form-control {{ $errors->has('password') ? ' has-error' : '' }}"
                            type="password"
                            name="password" placeholder="Password"
                            required autocomplete="current-password" >
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            <error :messages="$errors->get('password')" class="mt-2" />
            @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
       
        <!-- <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }} mb-3 ">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div>
        @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember_me" name="remember">
              <label for="remember_me"> 
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 
                dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 
                focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new Account</a>
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
