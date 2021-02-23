@extends('layouts.layout')
@section('title','Contact Us')
@section('content')

    <div class="container-fluid  fh5co_fh5co_bg_contcat">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"><span><i class="fa fa-phone"></i></span></div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">{{__('Call Us')}}</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">+970 566 170 044</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"><span><i class="fa fa-envelope"></i></span></div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">{{__('Have any questions?')}}</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">adda7mad@gmail.com</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"><span><i class="fa fa-map-marker"></i></span>
                            </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">{{__('Address')}}</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">Palestine</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="col-12 text-center contact_margin_svnit ">
                <div class="text-center fh5co_heading py-2">{{__('contact us')}}</div>
            </div>


            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="container">
                        @if(session()->has('message'))
                            <div class="alert alert-success container mt-2 mb-2" role="alert"
                                 style="width: 730px; text-align: center">
                                <strong>{{__('Sent')}}
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                         class="bi bi-check-circle-fill py-2"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger container mt-2 mb-2 py-2"
                                 style="width: 730px; text-align: center">
                                <strong>{{__('Whoops!')}}</strong> {{__('There were some problems with your input.')}}
                                <br><br>
                            </div>
                        @endif
                    </div>
                    <form class="row" id="fh5co_contact_form" enctype="multipart/form-data" method="post"
                          action="{{route('contact.store')}}">
                        @csrf
                        <div class="col-12 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="name"
                                   placeholder="{{__('enter your name')}}" value="{{old('name')??$contacts->name}}"/>
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box"
                                   placeholder="{{__('enter your email')}}"
                                   name="email" value="{{old('email')??$contacts->email}}"/>
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box"
                                   placeholder="{{__('Subject')}}"
                                   name="subject" value="{{old('subject')??$contacts->subject}}"/>
                        </div>
                        <div class="col-12 py-3">
                            <textarea class="form-control fh5co_contacts_message" placeholder="{{__('Message')}}"
                                      name="message"> {{old('message')??$contacts->message}}</textarea>
                        </div>
                        <div class="col-12 py-3 text-center">
                            <button class="btn contact_btn" name="submit">{{__('Send Message')}}</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 align-self-center">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16453.74669163741!2d34.46967526952137!3d31.550164045315917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7e673edf30cb%3A0xdeb4f4baf9004f99!2zMzHCsDMyJzUzLjAiTiAzNMKwMjgnMTUuMCJF!5e1!3m2!1sen!2sbe!4v1610772970193!5m2!1sen!2sbe"
                        class="map_sss" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
