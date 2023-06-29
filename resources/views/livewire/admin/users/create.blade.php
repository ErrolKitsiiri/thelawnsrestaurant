<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create a New User</h3>
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

                {{-- <select wire:model="role_id" class="form-control">
                    <option>Choose Service Category</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user_id->name }}</option>
                    @endforeach
                </select> --}}

                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select class="form-control" wire:model='role_id'>
                        <option>Select User Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Non-Administrator</option>
                    </select>
                </div>
                @error('role_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email"
                        wire:model='email'>
                </div>
                @error('email')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        wire:model='password'>
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:click.prevent='createUser'>Submit</button>
            </div>
        </form>
    </div>
</div>
