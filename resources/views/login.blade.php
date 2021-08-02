<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style>
      #language{
        position: absolute;
            left: 219%;
            top: 3%;
            display: flex;
            column-gap: 16%;
            z-index: 15;
      }
      #language a img {
          width: 32px;
      }
  </style>
  <link rel="stylesheet" href="css/login.css">
</head>
<body style="background-image:url('images/background.png') ">
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/bg.jpg" alt="login" class="login-card-img">
            <div id="language">
            @foreach(config('app.languages') as $langLocale => $langName)
             <a  href="{{ url()->current() }}?change_language={{ $langLocale }}">
                @if ($langLocale == "en")
                <img src=" {{asset('images/usa.svg')}} " alt="">
                @elseif ($langLocale == "fr")
                <img src=" {{asset('images/france.svg')}} " alt="">
                @endif
            </a>
             @endforeach
            </div>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="images/logo.png" style="width: 21%;" alt="logo" >
              </div>
              <p class="login-card-description"> {{__('Sign into your account')}} </p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">{{__('Email address')}}</label>
                    <input name="email"  type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email address')}}" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{__('Password')}}</label>
                    <input name="password"  type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('Password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="{{__('Login')}}">
                </form>
                {{-- <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> --}}
                <nav class="login-card-footer-nav">
                  <a href="#!">{{__('Terms of use')}}</a> -
                  <a href="#!">{{__('Privacy Policy')}}</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
