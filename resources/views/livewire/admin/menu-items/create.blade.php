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
                                        <h4>Post a New Menu Item</h4>
                                    </div>
                                    <div class="card-body ring-offset-2">
                                        <form>
                                            <div class="form-group">
                                                <label>Menu Item Name</label>
                                                <input type="text" wire:model="title" class="form-control">
                                            </div>
                                            @error('title')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Choose the Category of your Menu Item</label>
                                                <select wire:model="menu_category_id" class="form-control">
                                                    <option>Choose a Menu Item Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('menu_category_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Menu Item Description</label>
                                                <input type="text" wire:model="description" class="form-control">
                                            </div>
                                            @error('description')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Menu Item Price</label>
                                                <input type="number" wire:model="price" class="form-control">
                                            </div>
                                            @error('price')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label>Upload an Image of the Menu Item</label>
                                                <input type="file" wire:model="image_path" name='image'
                                                    class="form-control" placeholder="Image">
                                                @if ($image_path)
                                                    <div class="row">
                                                        <div class="col-3  mt-2 me-1 mb-2 ">
                                                            <img src="{{ $image_path->temporaryUrl() }}" height="200"
                                                                width="200">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            @error('image_path')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="card-body" class="btn-text-right">
                                                <div class="buttons">
                                                    <button class="btn btn-success" type="submit"
                                                        wire:click.prevent='createMenuItem'>Save</button>
                                                    <a href="#" class="btn btn-danger">Back to list</a>
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
