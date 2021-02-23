@extends('layouts.app')
@section('title',' Edit Contact')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9.5">
                <div class="card">
                    <form class="row" id="fh5co_contact_form" method="post"
                          action="">
                        @method('PATCH')
                        @csrf
                        <div class="col-12 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="name"
                                   placeholder="{{__('NAME')}}" value="{{old('name') ?? $contacts->name }}"/>
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" placeholder="E-mail"
                                   name="{{__('EMAIL')}}" value="{{old('email') ?? $contacts->email }}"/>
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" placeholder="Subject"
                                   name="{{__('SUBJECT')}}" value="{{old('subject') ?? $contacts->subject }}"/>
                        </div>
                        <div class="col-12 py-3">
                            <textarea class="form-control fh5co_contacts_message" placeholder="{{__('MESSAGE')}}"
                                      name="message"> {{old('message') ?? $contacts->message }}</textarea>
                        </div>
                        <div class="col-12 py-3 text-center">
                            <button class="btn contact_btn" name="submit">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
