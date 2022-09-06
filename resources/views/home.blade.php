@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div>
                            <a href="{{ route('prize.create') }}" class="btn btn-primary">
                                Add New Prize
                            </a>
                        </div>
                        <x-throwexceptions::gridjs :table="$prizeTable" name="prizeTable"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
