<div>
    <div>
        <div class="main-content" wire:ignore.self>
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Room Types</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="">
                                                        Number
                                                    </th>
                                                    <th>Title</th>
                                                    <th>Room Capacity</th>
                                                    <th>Rate Per Night</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $counter = 1;
                                                @endphp
                                                @foreach ($roomTypes as $key => $roomType)
                                                    <tr>
                                                        <td> {{ $roomTypes->firstItem() + $key }}</td>
                                                        <td>{{ $roomType->title }}</td>
                                                        <td>{{ $roomType->pax }}</td>
                                                        <td>{{ $roomType->rate }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.room-types.edit', $roomType->id) }}"
                                                                class="btn btn-dark flex-col mx-2">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            {{-- <button
                                                                onclick="confirm('Are you Sure you want to delete this Room Type?')||event.stopImmediatePropagation()"
                                                                wire:click="deleteRoomType({{ $roomType->id }})"
                                                                class="btn btn-danger flex-col mx-2">
                                                                <i class="fas fa-trash"></i>
                                                            </button> --}}
                                                            {{-- <button onclick="showConfirmation(event, {{ $roomType->id }}, 'room type')" class="btn btn-danger flex-col mx-2">
                                                                <i class="fas fa-trash"></i>
                                                            </button> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if (count($roomTypes))
                                            {{ $roomTypes->links() }}
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
