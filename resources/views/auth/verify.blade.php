@extends('layouts.app')

@section('content')
<div class="valign-wrapper row lRBox">
    <div class="col card hoverable s10 pull-s1 m4 pull-m4 l4 pull-l4">
        
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>
        <hr>
        <div class="card-action">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <div class="card-action">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


