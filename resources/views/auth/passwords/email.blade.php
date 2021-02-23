@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                    <div class="card-header"><h3
                            class="text-center font-weight-light my-4">{{ __('Reset Password') }}</h3></div>
                    <div class="card-body">
                        <div
                            class="small mb-3 text-muted">{{__('Enter your email address and we will send you a link to reset your password')}}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email',app()->getLocale()) }}">
                                @csrf
                                <div class="form-group">
                                    <label class="small mb-1" for="email">{{ __('E-Mail Address') }}</label>
                                    <input class="form-control py-4  @error('email') is-invalid @enderror" id="email"
                                           type="email" aria-describedby="emailHelp"
                                           placeholder="{{__('enter your email')}}" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="{{route('login',app()->getLocale())}}">{{  __('Login') }}</a>
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="{{route('register',app()->getLocale())}}">{{__('Register')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
