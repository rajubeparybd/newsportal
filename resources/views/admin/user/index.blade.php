<x-admin-layout>
    @section("page","Users")
    @if(session()->has("notification"))
        <x-toastr :notification="session()->get('notification')"/>
    @endif
    @can("create_role")
        <x-modal title="Add New Users">
            <form action="{{route("admin.user.manager.users.store")}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{old('name')}}" autofocus id="name" required
                               placeholder="Enter name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{old('email')}}" id="email" required
                               placeholder="Enter email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                               value="{{old('password')}}" id="password" required
                               placeholder="Enter password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" required
                                id="role">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{permissionToWords($role->name)}}</option>
                            @endforeach
                        </select>
                        @error('role')
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

    <x-datatable title="All Users">
        @can("create_user")
            <x-slot:button>
                <div class="float-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i
                            class="mdi mdi-plus-box-outline"></i> Add New User</a>
                </div>
            </x-slot:button>
        @endcan
        <thead>
        <tr class="text-center">
            <th width="10">#</th>
            <th width="15">Action</th>
            <th width="150">Name</th>
            <th width="150">Role</th>
            <th width>Email</th>
        </tr>
        </thead>
        <tbody>

        @forelse($users as $user)
            <tr class="text-center">
                <td class="text-center align-middle">{{$loop->index+1}}</td>
                <td class="text-center align-middle">
                    @if((!$user->hasRole("admin")) || ($user->id != auth()->id()))
                        @canany(["edit_user" , "delete_user"])
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop "
                                   data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fe-menu btn btn-primary"></i>
                                </a>

                                <div class="dropdown-menu" style=""> {{--dropdown-menu-right--}}
                                    @can("edit_user")
                                        <a href="{{route("admin.user.manager.users.edit", $user->id)}}"
                                           class="dropdown-item">
                                            <i class="mdi-pencil mdi"></i> Edit
                                        </a>
                                    @endcan
                                    @can("delete_user")
                                        <form method="POST"
                                              action="{{route("admin.user.manager.users.destroy", $user->id)}}">
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
                    @endif
                </td>
                <td class="text-center align-middle">{{roleToWords($user->name)}}</td>
                <td class="text-center align-middle">
                    @forelse($user->roles as $roles)
                        {{ucwords($roles->name)}}
                    @empty
                        User
                    @endforelse
                </td>
                <td class="align-middle">{{$user->email}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No User Found!</td>
            </tr>
        @endforelse
        </tbody>
    </x-datatable>
    <x-sweet-alert/>
</x-admin-layout>
