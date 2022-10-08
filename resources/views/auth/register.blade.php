@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback red-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback red-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback red-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

    <div class="valign-wrapper row lRBox">
        <div class="col card hoverable s10 pull-s1 m4 pull-m4 l4 pull-l4">
            <!-- <div class="progress" id="preloaderReg" style="position:relative; bottom:0.5rem;">
                <div class="indeterminate"></div>
            </div> -->
            <form method="POST" enctype="multipart/form-data" id="regform"  action="{{ route('register') }}">
                @csrf
                <h4 class="center" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);"><em>{{ __('Register') }}</em></h4>
                <div id="sigupmessage"></div>
                <div class="row" id="cardForm" style="height: 50vh;overflow-x: hidden;">
                    <div class="input-field col s6">
                        <label for="First Name">{{ __('firstname') }}</label>
                        <input type="text" id="firstname" class="validate @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname"/>
                        @error('firstname')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="last name">Last Name</label>
                        <input type="text"  name="lastname" id="lastname" class="validate @error('lastname') is-invalid @enderror" />
                        @error('lastname')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="username">User Name </label>
                        <input type="text" name="username" id="username" class="validate @error('username') is-invalid @enderror"  />
                        @error('username')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email"  id="email" class="validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                        @error('email')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <label for="password">{{ __('Password') }} </label>
                        <input type="password" id="passwords" data-length="8" placeholder="Password must be 8" onKeyPress="if(this.value.length==8) return false;" class="validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span toggle="#passwords" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                        @error('password')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <label for="password">{{ __('Confirm Password') }}</label>
                        <input type="password" class="validate" data-length="8" name="password_confirmation" id="passwords2" placeholder="Password must be 8" onKeyPress="if(this.value.length==8) return false;" required autocomplete="new-password"/>
                        <span toggle="#passwords2" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                    </div>

                    <div class="input-field col s6">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="validate @error('phone') is-invalid @enderror" name="phone" id="phone" onKeyPress="if(this.value.length==11) return false;"/>
                        @error('phone')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-field col s6">
                        <select class="browser-default validate @error('gender') is-invalid @enderror"  name="gender" id="gender" required>
                            <option value="#">Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <select class="browser-default validate @error('userType') is-invalid @enderror" name="userType" id="userType">
                            <option value="#">Select User Type</option>
                            <option value="E_CommerceAgent">E-Commerce Agent</option>
                            <option value="DeliveryAgent">Delivery Agent</option>
                        </select>
                    </div>

                    
                    
                </div>
                <!-- </div> -->
                <div class="card-action center-align">
                    <button type="submit" id="btnReg" name="btnReg" class="btn teal waves-effect waves-light">{{ __('Register') }}</button>
                    <!-- <a class="btn green waves-effect waves-light" href="#"> Sign Up </a> -->
                    <small class="whiteTxt">
                        Already have an account? <a href="{{ route('login') }}" id="toLogin">Login</a>
                    </small>
                </div>
            </form>
        </div>
    </div>


@endsection
