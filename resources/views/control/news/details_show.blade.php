@extends('layouts.admin')
@section('title','Details')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('About')}} <b>: {{ $news->title }}</b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="alert-header"><strong>{{__('TITLE')}}:</strong>
                                    <p style="color: olive"> {{ $news->title }}</p>
                                </h1>
                                <p><strong>{{__('USER')}} : </strong> {{ $news->user->name }}</p>
                                <p><strong>{{__('EMAIL')}} : </strong> {{ $news->user->email }}</p>
                                <p><strong>{{__('CASE')}} : </strong> {{ $news->case ? 'Popular':'Trending' }}</p>
                                <p><strong>{{__('SUMMARY')}} : </strong> {!!   $news->summary !!}</p>
                                <p><strong>{{__('DETAILS')}} : </strong> {!! $news->details !!}  </p>
                                <p><strong>{{__('CREATED AT')}} : </strong> {{ $news->created_at->format('D-M-Y') }}
                                    <br/>
                                    {{$news->created_at->format('h:i:s')}}</p>
                                <p><strong>{{__('UPDATED AT')}} : </strong>{{ $news->updated_at->format('D-M-Y') }}<br/>
                                    {{$news->updated_at->format('h:i:s')}}</p>
                            </div>
                        </div>

                        @if($news->image)
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/photos/web/' . $news->image) }}" alt="" class="img-thumbnail">
                                </div>
                            </div>
                        @endif
                        @if($news->video)
                            <div class="row">
                                <div class="col-12">
                                    {!! $news->video_html !!}
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('news.destroy', ['news' => $news]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('news.edit', ['news' => $news]) }}"
                               class="btn btn-outline-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg>
                            </a>
                            <button class="btn btn-outline-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                </svg>
                            </button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
