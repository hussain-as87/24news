@extends('layouts.admin')
@section('title', 'Contacts List')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{__('Show Contact')}}</h1>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{__('Primary Card')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{__('Warning Card')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{__('Success Card')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">{{__('Danger Card')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        {{__('Area Chart')}}
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        {{__('Bar Chart')}}
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                {{__('The Table')}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="color:olive">
                            <th scope="col">{{__('ID')}}</th>
                            <th scope="col">{{__('NAME')}}</th>
                            <th scope="col">{{__('EMAIL')}}</th>
                            <th scope="col">{{__('SUBJECT')}}</th>
                            <th scope="col">{{__('MESSAGE')}}</th>
                            <th scope="col">{{__('CREATED AT')}}</th>
                            <th scope="col">{{__('UPDATED AT')}}</th>
                            <!--                           <th scope="col">EDIT</th>
                                                        -->
                            <th scope="col">{{__('DELETE')}}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr style="color:olive">
                            <th scope="col">{{__('ID')}}</th>
                            <th scope="col">{{__('NAME')}}</th>
                            <th scope="col">{{__('EMAIL')}}</th>
                            <th scope="col">{{__('SUBJECT')}}</th>
                            <th scope="col">{{__('MESSAGE')}}</th>
                            <th scope="col">{{__('CREATED AT')}}</th>
                            <th scope="col">{{__('UPDATED AT')}}</th>
                            <!--                           <th scope="col">EDIT</th>
                                                        -->
                            <th scope="col">{{__('DELETE')}}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($contacts as$key=> $contact)
                            <tr>
                                <th scope="row">
                                    <div class="row-cols-md-5">
                                        <a class="link-dark alert-link btn-outline-dark"
                                           href="{{--{{ route('control.details', ['news' => $n]) }}--}}">{{ $key+1 }}</a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{--{{route('control.details',['advertise'=>$n])}}--}}"
                                       class="link-dark alert-link btn-outline-dark"> {{ $contact->name }}</a>
                                </td>
                                <td>
                                    <div class=" row-cols-md-5"><a href="{{--{{route('users.show')}}--}}"
                                                                   class="link-dark alert-link btn-outline-dark">  {{ $contact->email }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d3 row-cols-md-5">{{ $contact->subject }}</div>
                                </td>

                                <td>
                                    <div class="d3 row-cols-md-5">{{ $contact->message }}</div>
                                </td>
                                <td>
                                    <div class="" style="width:100px">{{ $contact->created_at }}</div>
                                </td>
                                <td>
                                    <div class="" style="width:100px">{{ $contact->updated_at }}</div>
                                </td>

                                <th>
                                    <form action="{{ route('contact.destroy', ['contact' => $contact]) }}"
                                          method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
