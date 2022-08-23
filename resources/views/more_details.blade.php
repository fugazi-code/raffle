@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <h3 class="card-title text-primary">{{ $prize->name }}</h3>
                                <p class="mb-4">
                                    {!! nl2br(e($prize->description)) !!}
                                </p>
                                {{--                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab-slots"
                                        aria-controls="tab-slots" aria-selected="true">
                                    Slot
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#tab-images"
                                        aria-controls="tab-images" aria-selected="true">
                                    Images
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body px-0">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="tab-slots" role="tabpanel" style="position: relative;">

                            </div>
                            <div class="tab-pane fade" id="tab-images" role="tabpanel"
                                 style="position: relative;">
                                <div class="d-flex flex-wrap">
                                    @foreach($prize->image as $item)
                                        <a href="{{ asset('storage/'.$item->path) }}" target="_blank">
                                            <img src="{{ asset('storage/'.$item->path) }}"
                                                 class="img-thumbnail rounded m-2"
                                                 style="max-width: 250px;max-height: 250px;">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
