<div>
    <div>
        <div class="main-content" wire:ignore.self>
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Customer Table Reservations</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="">
                                                        Number
                                                    </th>
                                                    <th>Customer Name</th>
                                                    <th>Table Capacity</th>
                                                    <th>Date & Time for Reservation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $counter = 1;
                                                @endphp
                                                @foreach ($table_reservations as $key =>  $table_reservation)
                                                    <tr>
                                                        <td> {{ $table_reservations->firstItem() + $key}} </td>
                                                        <td>{{ $table_reservation->tableReservations->name }}</td>
                                                        <td>{{ $table_reservation->pax }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($table_reservation->reservation_dateTime)->format('d/m/Y')}}</td>
                                                        {{-- <td>{{ $table_reservation->reservation_dateTime->toDayDateTimeString() }}</td> --}}
                                                        <td>
                                                                <a href="{{ route('admin.table-reservations.edit', $table_reservation->id) }}"
                                                                    class="btn btn-dark flex-col mx-2">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button
                                                                    onclick="confirm('Are you Sure you want to delete this Table Reservation?')||event.stopImmediatePropagation()"
                                                                    wire:click="deleteTableReservation({{ $table_reservation->id }})"
                                                                    class="btn btn-danger flex-col mx-2">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if (count($table_reservations))
                                            {{ $table_reservations->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
