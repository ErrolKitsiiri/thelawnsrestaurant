<div>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Existing Customers Details</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" wire:ignore>Name: {{ $name }}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" wire:model='name'>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"wire:ignore>Email Address: {{ $email }}</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" wire:model='email'>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" wire:ignore>Phone Number: {{ $phone_number }}</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Phone Number" wire:model='phone_number'>
                        @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" wire:ignore>Address: {{ $address }}</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Address" wire:model='address'>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" wire:click='updateCustomer'>Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
