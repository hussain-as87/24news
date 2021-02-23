@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('Register') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register',app()->getLocale()) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="small mb-1">{{ __('Name') }}</label>
                                <input id="name"
                                       class="form-control py-4  @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus type="text"
                                       placeholder="{{__('enter your name')}}"/>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="small mb-1">{{ __('E-Mail Address') }}</label>
                                <input id="email" class="form-control py-4 @error('email') is-invalid @enderror"
                                       type="email" aria-describedby="emailHelp"
                                       placeholder="{{__('enter your email')}}"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="password">{{ __('Password') }}</label>
                                        <input class="form-control py-4 @error('password') is-invalid @enderror"
                                               id="password" type="password" placeholder="{{__('enter your password')}}"
                                               name="password" required autocomplete="new-password"/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1"
                                               for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input class="form-control py-4" id="password-confirm" type="password"
                                               placeholder="{{__('enter config password')}}"
                                               name="password_confirmation" required
                                               autocomplete="new-password"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="container  col-md-12 icon-upload">
                                    <input type="file" class="py-2 col-md-7 " name="avatar" value="{{ old('avatar') }}">
                                    @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0 ">
                                <button type="submit" name="submit" class="btn btn-dark"
                                        style="width:100%">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="{{ route('login',app()->getLocale()) }}">{{ __('Login') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
