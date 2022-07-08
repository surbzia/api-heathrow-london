@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Roles</h5>
            <button class="btn btn-info btn-md rounded-pill" data-toggle="modal" data-target="#RoleAddModel" type="button">Add
                Role</button>

        </div>
        <hr>
        <div class="col-md-12">
            {{-- <div class="card-box mb-30 card-border" style="margin-right: 64px;"> --}}
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Manage</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm rounded-pill"
                                            href="{{ route('role.show', $role->id) }}">Permissions</a>

                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill" onclick="editRole({{$role}})" href="javascript:;"
                                            data-role="{{ $role }}">Edit</a>

                                        <form method="post" action="{{ route('role.destroy', $role->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.roles.model')
@endsection
@section('script')
    <script>
        function editRole(role){
            $('.edit_name').val(role.name);
            $('#role_id').val(role.id);
            let route = `{{ route('role.update_role') }}`;
            $('#edit_role_form').attr('action', route);
            $('#RoleEditModel').modal('show');
        }
    </script>
@endsection
