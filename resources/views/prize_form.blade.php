@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Prize Form') }}</div>
                    <div class="card-body">
                        @if($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            </div>
                        @endif
                        @isset($prize->id)
                                <form method="POST" action="{{ route('prize.update', ['id' => $prize->id]) }}">
                        @else
                            <form method="POST" action="{{ route('prize.store') }}">
                                @endisset
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label>Name</label>
                                        <input name="name" class="form-control"
                                               value="@isset($prize->name) {{ $prize->name }} @endisset">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label>Code</label>
                                        <input name="code" class="form-control"
                                               value="@isset($prize->code) {{ $prize->code }} @endisset">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label>is Published</label>
                                        <select name="is_published" class="form-select">
                                            @isset($prize->is_published)
                                                <option value="0" @if($prize->is_published == 0) selected @endif>No, do
                                                    not publish
                                                </option>
                                                <option value="1" @if($prize->is_published == 1) selected @endif>Yes,
                                                    publish it now!
                                                </option>
                                            @else
                                                <option value="0" selected>No, do not publish</option>
                                                <option value="1">Yes, publish it now!</option>
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2 mb-2">
                                        <label>Slot</label>
                                        <input type="text" name="slot" class="form-control"
                                               value="@isset($prize->slot) {{ $prize->slot }} @endisset">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="8">@isset($prize->description) {{ $prize->description }} @endisset</textarea>
                                    </div>
                                    <div class="col-12 mb-2 mt-3">
                                        <div class="d-grid gap-1">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
