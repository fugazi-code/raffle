<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Contestants for Prize ') }} <strong>{{ $prize['name'] }}</strong></div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Code Name</label>
                                    <input name="code_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>Real Name</label>
                                    <input name="real_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>Phone No.</label>
                                    <input name="phone_no" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>E-mail</label>
                                    <input name="email" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Address</label>
                                    <input name="address" class="form-control">
                                </div>
                                <div class="col-md-12 mt-2">
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
</div>
