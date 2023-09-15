<x-admin-layout>
    @section("page","Edit Roles")
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <form action="{{route("admin.user.manager.users.update", [$user->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name', $user->name)}}" autofocus id="name" required
                               placeholder="Enter name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{old('email', $user->email)}}" id="email" required
                               placeholder="Enter email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" required
                                id="role">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option @if($user->roles->first()->id == $role->id) selected
                                        @endif value="{{$role->id}}">
                                    {{permissionToWords($role->name)}}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
