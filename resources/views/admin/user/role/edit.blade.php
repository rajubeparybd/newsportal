<x-admin-layout>
    @section("page","Edit Roles")
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <form action="{{route("admin.user.manager.roles.update", [$role->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name', roleToWords($role->name))}}" autofocus id="name"
                               placeholder="Enter role name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Role Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  id="description" cols="30" rows="4"
                                  placeholder="Enter Role description">{{old("description", $role->description)}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="permissions">Role Permission</label>
                        <select name="permissions[]" class="form-control @error('description') is-invalid @enderror"
                                multiple
                                id="permissions">
                            <option value="">Select Permission</option>
                            @foreach($permissions as $permission)
                                <option @if(in_array($permission->id, $roleHasPermissions)) selected
                                        @endif value="{{$permission->id}}">{{permissionToWords($permission->name)}}</option>
                            @endforeach
                        </select>
                        @error('permissions')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>



