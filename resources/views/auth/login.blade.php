@extends('layouts.app')

@section('content')


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

    <div class="row valign-wrapper lRBox">
        <div class="col card hoverable s10 pull-s1 m4 pull-m4 l4 pull-l4">
            <form method="POST" id="loginform" action="{{ route('login') }}">
                @csrf
                <div class="card-header" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);"><h4 class="center"><em>{{ __('Login') }}</em></h4></div>
                <!-- <hr> -->

                <div class="row">
                    <!-- <div class="input-field col s12" id="emailArea" >
                        <i class="material-icons prefix">email</i>
                        <label for="uEmail">{{ __('E-Mail Address') }}</label>
                        <input type="email" id="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                         @error('email')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> -->
                    <div class="input-field col s12" id="emailArea" >
                        <i class="material-icons prefix">email</i>
                        <label for="uEmail">{{ __('E-Mail Address') }}/{{ __('Username') }}</label>
                        <input type="text" id="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                         @error('email')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12" id="passArea">
                        <i class="material-icons prefix">lock_open</i>
                        <label for="password">{{ __('Password') }} </label>
                        <input type="password" id="password" name="password" data-length="8" onKeyPress="if(this.value.length==8)return false;" class="validate @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                        <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                        @error('password')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col s12 checkBox" style="margin-left: 6px;">
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span> {{ __('Remember Me') }}</span>
                        </label>
                    </div>
                </div>
                
                
                
                <div class="card-action">
                    <button type="submit" id="next" name="next" class="btn teal waves-effect waves-light">{{ __('Login') }}</button>
                    <small class="right">
                        Don't have an account? <a href="{{ route('register') }}" id="toRegister">Create Account</a>
                    </small>
                    @if (Route::has('password.request'))
                        <small class="right" style="position:relative; bottom:1rem;">
                            Forgot Account details? <a href="{{ route('password.request') }}" id="account">Recover Account</a>
                        </small>
                    @endif
                    
                </div>
            </form>
        </div>
    </div>


@endsection
