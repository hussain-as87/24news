@extends('layouts.admin')
@section('title','create News')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Add News') }}</b></div>
                    <div class="card-body">
                        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">

                            @include('control.news.form')
                            <button type="submit" class="btn btn-dark">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
