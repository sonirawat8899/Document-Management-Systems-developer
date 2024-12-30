@extends('layouts.admin-login')

@section('content')
<style>
.form-manage {
    padding: 10%;
    background-image: linear-gradient(to right, #f4f4f4 , #9cb2cc);
    border: 1px solid #dad7d7;
}
.form-manage label {
    display: inline-block;
    font-size: 16px;
}
.form-manage button {
    width: 110px;
    font-size: 16px;
    margin-top: 4%;
}
.py-5 {
    padding-top:none;
    padding-bottom:none;
    background: #eee;
}
</style>
 <section class="login py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="form-manage">
                        <h2 class="text-center mb-4">Log in to your account</h2>
                        <form action="{{ route('login') }}" method="POST">
                            
                            @csrf
                            
                            <div class="input-effect position-relative mb-3">
                            <label>Email</label>                  
                                <input id="email" type="email" class="form-control effect-17 w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            
                            </div>

                            <div class="input-effect position-relative mb-3">
                            <label>Password</label>
                                <input id="password" type="password" class="form-control effect-17 w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            
                            </div>
                            



                            <div class="form-group row">
                                <div class="col-md-6 ">
                                    <div class="pl-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember_token') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            </div> 
                            

                            @if (Route::has('password.request'))
                                <p class="text-center mt-3">or 

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </p>
                            @endif
                            
                                <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-underline"> Sign up</a></p>
                
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
               

@endsection
