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
                                        <h4>Create a New Room Reservation</h4>
                                    </div>
                                    <div class="card-body ring-offset-2">
                                        <form>
                                            <div class="form-group" wire:ignore>
                                                <select class="form-control" id="select2" class="form-control"
                                                    wire:model="customer">
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer }}">{{ $customer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('customer')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label wire:ignore>Customer Name:</label>
                                                <input type="text" class="form-control" readonly
                                                    value=" {{ $customerData['name'] ?? null }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Customer Email:</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $customerData['email'] ?? null }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Customer Phone Number:</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $customerData['phone_number'] ?? null }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="room_type">Room Type</label>
                                                <select class="form-control" name="room_type" id="room_type"
                                                    wire:model='roomType' wire:change='filterRoomNumbers'>
                                                    <option value="">Select a Room Type</option>
                                                    @foreach ($roomTypes as $type)
                                                        <option value="{{ $type->id }}">{{ $type->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('roomType')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label for="room_number">Room Number</label>
                                                <select class="form-control" name="room_number" id="room_number"
                                                    wire:model="roomNumber">
                                                    <option value="">Select a Room Number</option>
                                                    @if ($roomNumbers)
                                                        @foreach ($roomNumbers as $room)
                                                            <option value="{{ $room->id }}">
                                                                {{ $room->room_number }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            @error('roomNumber')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Check in Date :</label>
                                                <div class="input-group date" id="reservationdatetime"
                                                    data-target-input="nearest">
                                                    <input type="date" class="form-control datetimepicker-input"
                                                        data-target="#reservationdatetime" wire:model='check_in' />
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            @error('check_in')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror


                                            <div class="form-group">
                                                <label>Check out Date :</label>
                                                <div class="input-group date" wire:ignore id="reservationdatetime"
                                                    data-target-input="nearest">
                                                    <input type="date" class="form-control datetimepicker-input"
                                                        data-target="#reservationdatetime" wire:model='check_out' />
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            @error('check_out')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror



                                            <div class="form-group">
                                                <label>Rate</label>
                                                <input type="number" readonly value="{{ $rate }}"
                                                    class="form-control" min="1" max="10000">
                                            </div>
                                            @error('rate')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="card-body" class="btn-text-right">
                                                <div class="buttons">
                                                    <button class="btn btn-success" type="submit"
                                                        wire:click.prevent='createRoomReservation'>Save</button>
                                                    <a href="{{ route('admin.room-reservations.index') }}"
                                                        class="btn btn-danger">Back to list</a>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var data = $('#select2').select2("val");
                @this.set('client', data);
            });
        });
    </script>
@endpush
