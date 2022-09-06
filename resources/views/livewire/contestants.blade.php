<div>
    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    All slots will be deleted, are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            wire:click="remove({{ $prize->id }})">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-4">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <i>{{ strtoupper($prize['name']) }}</i> slot status <br>
                        <i class='bx bx-street-view text-info'></i> <strong>{{ count($this->contestant) }}</strong>
                        <i class='bx bx-droplet text-success'></i> <strong>{{ $this->openSlots }}</strong>
                        <i class='bx bxs-droplet-half text-primary'></i>
                        <strong>{{ count($this->contestant) - $this->openSlots }}</strong>
                    </h3>
                    @if(count($this->contestant) == 0)
                    <form class="row g-3">
                        <div class="col-6">
                            <label>From</label>
                            <input type="text" class="form-control" placeholder="From" wire:model="range.from">
                        </div>
                        <div class="col-6">
                            <label>To</label>
                            <input type="text" class="form-control" placeholder="To" wire:model="range.to">
                        </div>
                    </form>
                    @endif
                    @error('range.from') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('range.to') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="card-footer">
                    @if(count($this->contestant) == 0)
                        <a href="#" class="btn btn-primary" wire:click="store">Add Contestant</a>
                    @else
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                            Delete All
                        </button>
                    @endif
                    <a href="{{ route('home') }}" class="ms-2 btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 row">
            @foreach($this->contestant as $key => $detail)
                <div class="col-md-auto mt-2 mt-md-5" x-data="{forDelete: false}">
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-6 col-md-4">
                                    <label class="my-auto mr-2"> SLOT </label>
                                    <input name="phone_no" class="form-control form-control-sm"
                                           wire:model.debounce.500ms="contestant.{{$key}}.slot_no">
                                </div>
                                <div class="col-6 col-md-4">
                                    <label>Code Name</label>
                                    <input name="code_name" class="form-control form-control-sm"
                                           wire:model.debounce.500ms="contestant.{{$key}}.code_name">
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-switch mt-2 mt-md-4">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               wire:model.debounce.500ms="contestant.{{$key}}.is_paid">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Is Paid?</label>
                                    </div>
                                </div>
                                {{--                                <div class="col-md-3 d-flex flex-column">--}}
                                {{--                                    <div class="col-md-auto my-auto">--}}
                                {{--                                        <button class="btn btn-danger" x-show="!forDelete" @click="forDelete = true">--}}
                                {{--                                            <i class="bx bx-trash"></i>--}}
                                {{--                                        </button>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-md-auto row" x-show="forDelete">--}}
                                {{--                                        <div class="col mb-3">--}}
                                {{--                                            <button class="btn btn-secondary w-100 text-nowrap"--}}
                                {{--                                                    @click="forDelete = false">No, Cancel--}}
                                {{--                                            </button>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col m-0">--}}
                                {{--                                            <button class="btn btn-primary w-100" @click="forDelete = false"--}}
                                {{--                                                    wire:click="remove({{ $detail['id'] }})">--}}
                                {{--                                                Remove--}}
                                {{--                                            </button>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
