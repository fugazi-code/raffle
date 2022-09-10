@extends('layouts.guest')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                @foreach($prize as $item)
                    <div class="col-md-12 d-flex flex-column mb-1" x-data="{open: true}">
                        <div class="d-grid gap-1" x-on:click="open = !open">
                            <div :class="open ? 'rounded' : 'rounded-top'" class="bg-info p-2 d-flex justify-content-between bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                               <label class="fs-5 fw-bold text-white my-auto ms-2 text-truncate">
                                    @if(count($item->draws))
                                        <span class="badge bg-warning">CLOSED</span>
                                    @else
                                        <span class="badge bg-success">OPEN</span>
                                    @endif
                               </label>
                               <div class="d-flex flex-column me-2">
                                    <label class="fw-bold text-warning">{{ $item->open_slots_count }} slots left!</label>
                                    <label class="text-white fst-italic">{{ \Carbon\Carbon::parse($item->create_at)->format('F j, Y') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseExample">
                            
                          <div class="text-white bg-secondary rounded-bottom p-2">
                                <label class="fs-4 fw-semibold">{{ $item->name }}</label>
                                <div class=" d-flex flex-wrap">
                                    <p class="fs-5 me-3"><span class="text-dark">Bet:</span> {{ $item->bet }} Php</p>
                                    <p class="fs-5 me-3"><span class="text-dark">Paid:</span> <span class="text-success">{{ $item->paid_count }}</span></p>
                                    <p class="fs-5 me-3"><span class="text-dark">Unpaid:</span> <span class="text-danger">{{ $item->unpaid_count }}</span></p>
                                </div>
                                <div class="d-grid gap-1">
                                
                                <a href="{{ route('details.id', ['id' => $item->code]) }}"
                                    class="btn btn-primary">View</a>
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
        </div>
    </div>
@endsection
