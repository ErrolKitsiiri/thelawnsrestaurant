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
                                        <h4>Update an Existing Room Type</h4>
                                    </div>
                                    <div class="card-body ring-offset-2">
                                        <form>
                                            <div class="form-group">
                                                <label>Room Type Name : {{ $title }}</label>
                                                <input type="text" wire:model="title" class="form-control">
                                            </div>
                                            @error('title')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Room Capacity : {{ $pax }}</label>
                                                <input type="number" wire:model="pax" class="form-control">
                                            </div>
                                            @error('pax')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Rate Charged Per Night : {{ $rate }}</label>
                                                <input type="number" wire:model="rate" class="form-control">
                                            </div>
                                            @error('rate')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="card-body" class="btn-text-right">
                                                <div class="buttons">
                                                    <button class="btn btn-success" type="submit"
                                                        wire:click.prevent='updateRoomType'>Save</button>
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
