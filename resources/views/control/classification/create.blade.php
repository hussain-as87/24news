@extends('layouts.admin')
@section('title','Create Classification')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Add Classifications') }}</b></div>
                    <div class="card-body">
                        <form action="{{route('class.store')}}" method="post">
                            @include('control.classification.form2')
                            <button type="submit" class="btn btn-dark">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
