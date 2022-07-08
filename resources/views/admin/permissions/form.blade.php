@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill float-right" href="{{ route('permission.index') }}">back</a>
            <div class="custom-control custom-checkbox mb-5  float-right mr-3">
                <input type="checkbox" name="create_crud" form="permission-form"  class="custom-control-input"
                    id="create_crud">
                <label class="custom-control-label " for="create_crud">Create CRUD</label>
            </div>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            {{-- <div class="card mb-30 card-border"> --}}
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route }}" method="POST" id="permission-form">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-12 name">
                                <div class="form-group">
                                    <label>Permission Name</label>
                                    <input type="text" form="permission-form"  id="name" onkeyup="generateSlug(event)"
                                        value="{{ old('name', $edit_permission->name) }}" class="form-control" name="name"
                                        placeholder="Permission Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 slug">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" form="permission-form"  id="slug" class="form-control"
                                        value="{{ old('slug', $edit_permission->slug) }}" name="slug"
                                        placeholder="Permission Slug">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 add_module d-none">
                                <div class="form-group">
                                    <label>Add New Module</label>
                                    <input type="text" form="permission-form"  class="form-control" name="new_module" id="new_module"
                                        placeholder="Module">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 module">
                                <div class="form-group">
                                    <label>Select Module</label>
                                    <select onchange="enableAddModule(event)" form="permission-form"  class="form-control" name="module"
                                        id="module" id="">
                                        <option value="" selected>Select Module</option>
                                        <option value="1" class="text-primary">Add New Module</option>
                                        @foreach ($permissions as $permission)
                                            <option
                                                {{ $edit_permission->module == $permission->module ? 'Selected' : '' }}
                                                value="{{ $permission->module }}">{{ $permission->module }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2"
                                    type="button" form="permission-form"  onclick="ValidateForm()">{{ $button }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
            $(document).ready(function() {
            $('#create_crud').change(function() {
               if($(this).is(":checked")){
                $('.add_module').removeClass('d-none');
                $('.module').addClass('d-none');
                $('.name').addClass('d-none');
                $('.slug').addClass('d-none');
               }else {
                $('.add_module').addClass('d-none');
                 $('.module').removeClass('d-none');
                $('.name').removeClass('d-none');
                $('.slug').removeClass('d-none');
            }
            });
        });

        function ValidateForm() {
            if (!$('#create_crud').is(':checked') &&  $('#new_module').val() != '') {
                $('#permission-form').submit();
            } else {
                swal("Error!", "Module name is required.", "error");
            }
        }
        function enableAddModule(event) {
            let value = event.target.value;
            if (value == 1) {
                $('.add_module').removeClass('d-none');
            } else {
                $('.add_module').addClass('d-none');
            }
        }

        function generateSlug(event) {
            let str = event.target.value;

            let module = $('#module').val();
            let new_module = $('#new_module').val();
            if (module != 1 || new_module != '') {
                str = str.replace(/[^a-zA-Z0-9\s]/g, "");
                // $('#name').val(str);
                str = str.toLowerCase();
                str = str.replace(/\s/g, '-');

                let module_value = (module != 1) ? module : new_module;
                let slug = str + '-' + module_value;
                $('#slug').val(slug.toLowerCase());
            } else {
                alert('Select or Add Moduel first..');
            }
        }
    </script>
@endsection
