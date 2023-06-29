<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div>
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card center">
                                    <div class="card-header">
                                        <h4>Update an Existing Room Reservation</h4>
                                    </div>
                                    <div class="card-body ring-offset-2">
                                        <form>

                                            <div class="form-group">
                                                <label wire:ignore>Customer Name:</label>
                                                <input type="text" class="form-control" readonly
                                                    value=" {{ $client ? $client->name : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label wire:ignore>Customer Email:</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $client ? $client->email : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label wire:ignore>Customer Phone Number:</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $client ? $client->phone_number : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="room_type">Room Type</label>
                                                <select class="form-control" name="room_type" id="room_type"
                                                    wire:model='roomType'>
                                                    <option value="">Select a Room Type</option>
                                                    @foreach ($roomTypes as $roomType)
                                                        <option value="{{ $roomType->id }}">{{ $roomType->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('roomType')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                            <div>
                                                <label for="room_number">Room Number</label>
                                                <select wire:model="roomNumber" id="room_number" class="form-control">
                                                    <option value="">Select Room Number</option>
                                                    @foreach ($roomNumbers as $id => $number)
                                                        <option value="{{ $id }}">{{ $number }}</option>
                                                    @endforeach
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
                                                <div class="input-group date" id="reservationdatetime"
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
                                                <label for="rate">Rate</label>
                                                <input wire:model="rate" type="text" id="rate"
                                                    class="form-control" readonly value='{{ $rate }}'>
                                                @error('rate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="card-body" class="btn-text-right">
                                                <div class="buttons">
                                                    <button class="btn btn-success" type="submit"
                                                        wire:click.prevent='updateRoomReservation'>Save</button>
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

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var data = $('#select2').select2("val");
                @this.set('client', data);
            });
        });
    </script>
@endpush --}}
