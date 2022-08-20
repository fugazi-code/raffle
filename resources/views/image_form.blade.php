@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Images') }}</div>
                    <div class="card-body">
                        @if($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('image.upload', ['id' => $id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <label>Image</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="ms-2 h-100 pt-4">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            @foreach($images as $value)
                                <div class="col-md-6 mt-5">
                                    <div class="d-flex flex-column">
                                        <div>
                                            <img src="{{ asset('storage/'.$value['path']) }}" class="img-fluid"
                                                 alt="item">
                                        </div>
                                        <div class="d-grid gap-1 mt-3">
                                            <a href="{{ route('image.delete', ['id' => $value['id']]) }}"
                                               class="btn btn-outline-danger">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
