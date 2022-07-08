@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Permissions assigned to <b>{{ $role->name }}</b></h5>
            <a class="btn btn-dark btn-sm rounded-pill float-right mr-10" href="{{ route('role.index') }}">back</a>

            <form action="{{ route('role.update_permissions') }}" id="permission_form" method="post">
                <input type="hidden" form="permission_form" name="role_id" id="role_id" value="{{ $role->id }}">
                @csrf
                <button type="submit" id="permission_form" form="permission_form"
                    class="btn btn-primary btn-sm rounded-pill float-right mr-10">Update</button>

            </form>
            <div class="custom-control custom-checkbox float-right mr-20">
                <input type="checkbox" class="custom-control-input " id="select_all_permissions">
                <label class="custom-control-label" for="select_all_permissions">Select All</label>
            </div>

        </div>
        <hr>
        <div class="col-md-12">
              <div class="card-box height-100-p widget-style1 p-5">
            <div class="row">

                @foreach ($permissions as $key => $permissons)
                    <div class="col-md-3">
                        <div class="card card-box border-dark">
                            <div class="card-header">
                                {{ $key }}
                            </div>
                            <div class="card-body">
                                @foreach ($permissons as $subkey => $permission)
                                    @php
                                        $selected = in_array($permission->id, $role_permissions->toArray()) ? 'checked' : '';
                                    @endphp

                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" form="permission_form" name="role_permissions[]"
                                            class="custom-control-input permissions" value="{{ $permission->id }}"
                                            {{ $selected }}
                                            id="permission_check_{{ $key }}_{{ $subkey }}">
                                        <label class="custom-control-label "
                                            for="permission_check_{{ $key }}_{{ $subkey }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#select_all_permissions').change(function() {
                console.log($(this).is(":checked"));
                if ($(this).is(":checked")) {
                    $('.permissions').each(function() {
                        $(this).prop("checked", true);
                    });
                } else {
                    $('.permissions').each(function() {
                        $(this).prop("checked", false);
                    });
                }
            });
        });


    </script>
@endsection
