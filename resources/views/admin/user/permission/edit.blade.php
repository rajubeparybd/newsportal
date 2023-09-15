<x-admin-layout>
    @section("page","Edit Permissions")
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <form action="{{route("admin.user.manager.permissions.update", [$permission->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Permission Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name', permissionToWords($permission->name))}}" autofocus id="name"
                               placeholder="Enter permission name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Permission Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  id="description" cols="30" rows="4"
                                  placeholder="Enter permission description">{{old("description", $permission->description)}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>



