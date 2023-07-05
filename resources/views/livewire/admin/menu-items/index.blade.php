<div>
    <div class="main-content" wire:ignore.self>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Menu Items List</h4>
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
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counter = 1;
                                            @endphp
                                            @foreach ($menuItems as $key => $menuItem)
                                                <tr>
                                                    <td> {{ $menuItems->firstItem() + $key }} </td>
                                                    <td>{{ $menuItem->title ?? '' }}</td>
                                                    <td>{{ $menuItem->menuCategory->title ?? '' }}</td>
                                                    <td>{{ $menuItem->price ?? ''}}</td>
                                                    <td>
                                                        <img src="{{ asset('images/admin/menu_item_images/' . $menuItem->image_path) }}"
                                                            height="100" width="100">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.menu-items.edit', $menuItem->id) }}"
                                                            class="btn btn-dark flex-col mx-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button
                                                            onclick="confirm('Are you Sure you want to delete this Menu Item?')||event.stopImmediatePropagation()"
                                                            wire:click="deleteMenuItem({{ $menuItem->id }})"
                                                            class="btn btn-danger flex-col mx-2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (count($menuItems))
                                        {{ $menuItems->links() }}
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
