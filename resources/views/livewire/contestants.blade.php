<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ __('Prize for') }} <strong>{{ $prize['name'] }}</strong></h2>
                        <div class="d-flex flex-row">
                            <h2 class="me-2">{{ __('Slots') }} <strong>{{ count($this->contestant) }}</strong></h2>
                            <h2 class="me-2">{{ __('Open') }} <strong>{{ $this->openSlots }}</strong></h2>
                            <h2 class="me-2">{{ __('Closed') }} <strong>{{ count($this->contestant) - $this->openSlots }}</strong></h2>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="d-grid gap-1">
                            <a href="#" class="btn btn-primary" wire:click="store">Add Contestant</a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="d-grid gap-1">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($this->contestant as $key => $detail)
                <div class="col-md-6 mt-5" x-data="{forDelete: false}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="my-auto mr-2"> SLOT # </label>
                                    <input name="phone_no" class="form-control" wire:model.debounce.500ms="contestant.{{$key}}.slot_no">
                                </div>
                                <div class="col-md-3">
                                    <label>Code Name</label>
                                    <input name="code_name" class="form-control" wire:model.debounce.500ms="contestant.{{$key}}.code_name">
                                </div>
                                <div class="col-md-3">
                                    <label>Phone No.</label>
                                    <input name="phone_no" class="form-control" wire:model.debounce.500ms="contestant.{{$key}}.phone_no">
                                </div>
                                <div class="col-md-3 d-flex flex-column">
                                    <div class="col-md-auto my-auto">
                                        <button class="btn btn-danger" x-show="!forDelete" @click="forDelete = true">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-auto row" x-show="forDelete">
                                        <div class="col mb-3">
                                            <button class="btn btn-secondary w-100 text-nowrap"
                                                    @click="forDelete = false">No, Cancel
                                            </button>
                                        </div>
                                        <div class="col m-0">
                                            <button class="btn btn-primary w-100" @click="forDelete = false"
                                                    wire:click="remove({{ $detail['id'] }})">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
