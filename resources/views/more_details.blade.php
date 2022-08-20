@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $prize->name }}</h5>
                                <p class="mb-4">
                                    {!! nl2br(e($prize->description)) !!}
                                </p>
                                {{--                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="/theme/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                     alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                     data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4">
                <div class="d-flex">
                    @foreach($prize->image as $item)
                        <div>
                            <a href="{{ asset('storage/'.$item->path) }}" target="_blank">
                                <img src="{{ asset('storage/'.$item->path) }}" class="img-thumbnail rounded m-2"
                                     style="max-width: 250px;max-height: 250px;">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
