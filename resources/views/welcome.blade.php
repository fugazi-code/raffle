@extends('layouts.guest')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @foreach($prize as $item)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">
                                    <div class="d-flex flex-row">
                                        {{--                                            <a href="#" class="btn btn-primary">Join Now</a>--}}
                                        <a href="{{ route('details.id', ['id' => $item->id]) }}" class="btn btn-primary">More Details</a>
                                    </div>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($item->create_at)->format('F j, Y') }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @isset($item->image[0])
                                    <img class="card-img card-img-right" style="height: 150px;" src="{{ asset($item->image[0]['path']) }}" alt="Card image cap">
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                {{ $prize->links() }}
            </div>
        </div>
    </div>
@endsection
