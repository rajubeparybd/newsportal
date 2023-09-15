<x-admin-layout>
    @section("page","Permissions")
    @if(session()->has("notification"))
        <x-toastr :notification="session()->get('notification')"/>
    @endif
    @if(config("app.debug"))
        <x-modal title="Add New Permission">
            <form action="{{route("admin.user.manager.permissions.store")}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Permission Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name')}}" autofocus id="name"
                               placeholder="Enter permission name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Permission Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  id="description" cols="30" rows="4"
                                  placeholder="Enter permission description">{{old("description")}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </x-modal>
    @endif

    <x-datatable title="All Permissions">
        @if(config("app.debug"))
            <x-slot:button>
                <div class="float-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i
                            class="mdi mdi-plus-box-outline"></i> Add New Permission</a>
                </div>
            </x-slot:button>
        @endif
        <thead>
        <tr class="text-center">
            <th width="10">#</th>
            <th width="150">Name</th>
            <th width="auto">Description</th>
            <th width="150">Permission</th>
            <th width="25">Action</th>
        </tr>
        </thead>
        <tbody>

        @forelse($permissions as $permission)
            <tr>
                <th class="text-center align-middle">{{$loop->index+1}}</th>
                <th class="text-center align-middle">{{permissionToWords($permission->name)}}</th>
                <th class="align-middle">{{$permission->description}}</th>
                <th class="text-center align-middle">{{$permission->name}}</th>
                <th class="text-center align-middle">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop "
                           data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="fe-menu btn btn-primary"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            <a href="{{route("admin.user.manager.permissions.edit", $permission->id)}}"
                               class="dropdown-item">
                                <i class="mdi-pencil mdi"></i> Edit
                            </a>

                            <form method="POST"
                                  action="{{route("admin.user.manager.permissions.destroy", $permission->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:void(0);" type="button" class="dropdown-item show_confirm">
                                    <i class="mdi mdi-delete"></i>
                                    Delete
                                </a>
                            </form>
                        </div>
                    </div>
                </th>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No Permission Found!</td>
            </tr>
        @endforelse
        </tbody>
    </x-datatable>
    <x-sweet-alert/>
</x-admin-layout>



