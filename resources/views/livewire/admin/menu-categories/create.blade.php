<div>
    <div>
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card center">
                                <div class="card-header">
                                    <h4>Post a New Menu Category</h4>
                                </div>
                                <div class="card-body ring-offset-2">
                                    <form>
                                        <div class="form-group">
                                            <label for="title">Category Name</label>
                                            <input type="text" wire:model="menuCategory.title" class="form-control">
                                        </div>
                                        @error('menuCategory.title')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="image_path">Upload an Image of the Category</label>
                                            <input type="file" wire:model="image_path" name='image_path' class="form-control"
                                                placeholder="Image">
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
                                                <button class="btn btn-success" type="submit" wire:click.prevent='create'>Save</button>
                                                <a href="{{ route('admin.menu-categories.index') }}" class="btn btn-danger">Back to list</a>
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

