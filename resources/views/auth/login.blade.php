<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<link href="{{ asset('admin/assets/css/style.css') }}"rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('https://th.bing.com/th/id/R.abb64af8cb6a57015fcd9e016fb43955?rik=4jb8MMRZaMTovg&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fZWb1ZEQ.jpg&ehk=9bk9QWuvtS7LCt49NBH6NiQWcXXVyw7PpYoSkamIAY8%3d&risl=&pid=ImgRaw&r=0')">
<div class="container align-items-center py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mx-5 my-5" style="background: linear-gradient(to right, #36d1dc, #5b86e5);">
                <div class="card-header text-center"><h3><b>{{ __('Please login to system') }}</b></h3></div>
                <div class="text-center py-3 mt-3">
                    <img src="{{asset('admin/assets/img/logo-color.png')}}" width="15%" height="15%" style="border-radius: 10px">
                </div>
                
                <div class="card-body px-5"  >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password" class=" col-form-label">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="pr-5 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>                                
                                    
                                </div>
                        <div class="row mb-3 mt-3">
                            <div  class="col-md-12" >
                                <button  type="submit" class="btn btn-primary" style="width:100%" >
                                    {{ __('Login') }}
                                </button>
                                <!-- <span class="px-4">Don't you have an Account? 
                                    <a href="{{ url('/register')}}">Click here</a>
                                </span> -->


                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4" style="text-align: right">
                                <div class="form-check">
                                </div>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //orginal -->
<!-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>                                
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <span class="px-4">Don't you have an Account? 
                                    <a href="{{ url('/register')}}">Click here</a>
                                </span>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<style>
    .body{
        background-image: url("{{asset('admin/assets/img/login-bg.png')}}");
    }
</style>
</body>
</html>
