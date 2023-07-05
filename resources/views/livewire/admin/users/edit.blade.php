<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update an Existing User</h3>
        </div>
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" wire:ignore>Name: {{ $this->user->name }}</label>
                    <input type="text" class="form-control"  placeholder="Enter Name" wire:model='user.name'>
                    @error('user.name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role" wire:ignore>Role: {{ $this->user->role->title }}</label>
                    <select class="form-control" wire:model='user.role_id'>
                        <option value="">Select Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Non Administrator</option>
                    </select>
                    @error('user.role_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" wire:ignore>Email Address: {{ $this->user->email }}</label>
                    <input type="email" class="form-control" placeholder="Enter Email" wire:model='user.email'>
                    @error('user.email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Password: {{ $password }}</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" wire:model='password'>
                </div> --}}
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:click.prevent='save'>Submit</button>
            </div>
        </form>
    </div>
</div>
