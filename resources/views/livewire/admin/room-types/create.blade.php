<div>
    <div>
        <div>
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card center">
                                    <div class="card-header">
                                        <h4>Create a New Room Type</h4>
                                    </div>
                                    <div class="card-body ring-offset-2">
                                        <form>
                                            <div class="form-group">
                                                <label>Room Type Name</label>
                                                <input type="text" wire:model="roomType.title" class="form-control" placeholder="Enter Room Type Name">
                                            </div>
                                            @error('roomType.title')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Room Capacity</label>
                                                <input type="number" wire:model="roomType.pax" class="form-control" placeholder="Enter Room Capacity">
                                            </div>
                                            @error('roomType.pax')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Rate Charged Per Night</label>
                                                <input type="number" wire:model="roomType.rate" class="form-control" placeholder="Enter amount charged per night">
                                            </div>
                                            @error('roomType.rate')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="card-body" class="btn-text-right">
                                                <div class="buttons">
                                                    <button class="btn btn-success" type="submit"
                                                        wire:click.prevent='save'>Save</button>
                                                    <a href="{{ route('admin.room-types.index') }}" class="btn btn-danger">Back to list</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
