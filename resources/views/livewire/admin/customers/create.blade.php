<div>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Register a New Customer</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model='customer.name'>
                        @error('customer.name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter Email"
                            wire:model='customer.email'>
                        @error('customer.email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter Phone Number"
                            wire:model='customer.phone_number'>
                        @error('customer.phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Address" wire:model='customer.address'>
                        @error('customer.address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="save">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
