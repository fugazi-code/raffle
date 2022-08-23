<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto mt-2">
                <div class="d-grid gap-1">
                    <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ __('Add Contestants for Prize ') }}
                        <strong>{{ $prize['name'] }}</strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label>Code Name</label>
                                <input name="code_name" class="form-control" wire:model="detail.code_name">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Real Name</label>
                                <input name="real_name" class="form-control" wire:model="detail.real_name">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Phone No.</label>
                                <input name="phone_no" class="form-control" wire:model="detail.phone_no">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12"></div>
            <div class="col-auto mt-4">
                @dump($this->contestant)
            </div>
        </div>
    </div>
</div>
