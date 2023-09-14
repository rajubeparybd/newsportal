<x-admin-layout>
    @section("page","Permissions")
    @if(session()->has("notification"))
        <x-toastr :notification="session()->get('notification')"/>
    @endif
    @can("create_role")
        <x-modal title="Add New Permission">
            <form action="{{route("admin.user.manager.roles.store")}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name')}}" autofocus id="name"
                               placeholder="Enter Role name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Role Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  id="description" cols="30" rows="4"
                                  placeholder="Enter Role description">{{old("description")}}</textarea>
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
                                <option value="{{$permission->id}}">{{permissionToWords($permission->name)}}</option>
                            @endforeach
                        </select>
                        @error('permissions')
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
    @endcan

    <x-datatable title="All Roles">
        @can("create_role")
            <x-slot:button>
                <div class="float-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i
                            class="mdi mdi-plus-box-outline"></i> Add New Role</a>
                </div>
            </x-slot:button>
        @endcan
        <thead>
        <tr class="text-center">
            <th width="10">#</th>
            <th width="15">Action</th>
            <th width="100">Name</th>
            <th width="auto">Permissions</th>
            <th width="350">Description</th>
            <th width="100">Slug</th>
        </tr>
        </thead>
        <tbody>

        @forelse($roles as $role)
            <tr>
                <td class="text-center align-middle">{{$loop->index+1}}</td>
                <td class="text-center align-middle">
                    {{--                    @if($role->name != "admin")--}}
                    @cannot("edit_role" || "delete_role")
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop "
                               data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fe-menu btn btn-primary"></i>
                            </a>

                            <div class="dropdown-menu" style=""> {{--dropdown-menu-right--}}
                                @can("edit_role")
                                    <a href="{{route("admin.user.manager.roles.edit", $role->id)}}"
                                       class="dropdown-item">
                                        <i class="mdi-pencil mdi"></i> Edit
                                    </a>
                                @endcan
                                @can("delete_role")
                                    <form method="POST"
                                          action="{{route("admin.user.manager.roles.destroy", $role->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0);" type="button"
                                           class="dropdown-item show_confirm">
                                            <i class="mdi mdi-delete"></i>
                                            Delete
                                        </a>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endcannot
                    {{--                    @endif--}}
                </td>
                <td class="text-center align-middle">{{roleToWords($role->name)}}</td>
                <td class="align-middle">
                    @foreach($role->permissions as $permission)
                        {{permissionToWords($permission->name)}}@if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
                <td class="align-middle">{{$role->description}}</td>
                <td class="text-center align-middle">{{$role->name}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No Role Found!</td>
            </tr>
        @endforelse
        </tbody>
    </x-datatable>
    <x-sweet-alert/>
</x-admin-layout>



