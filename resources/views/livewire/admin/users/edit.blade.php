<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update an Existing User</h3>
        </div>
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name: {{ $name }}</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" wire:model='name'>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role: {{ $role_id }}</label>
                    <select class="form-control" wire:model='role_id'>
                        <option value="">Select Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Non Administrator</option>
                    </select>
                    @error('role_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email Address: {{ $email }}</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" wire:model='email'>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Password: {{ $password }}</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" wire:model='password'>
                </div> --}}
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:click.prevent='updateUser'>Submit</button>
            </div>
        </form>
    </div>
</div>
