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
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name"
                            wire:model='name'>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email"
                            wire:model='email'>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Phone Number" wire:model='phone_number'>
                        @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Address" wire:model='address'>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="createCustomer">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
