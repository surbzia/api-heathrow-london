@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('permission.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            {{-- <div class="card mb-30 card-border"> --}}
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route }}" method="POST">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Permission Name</label>
                                    <input type="text" id="name" onkeyup="generateSlug(event)"
                                        value="{{ old('name', $edit_permission) }}" class="form-control" name="name"
                                        placeholder="Permission Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" id="slug" class="form-control"
                                        value="{{ old('slug', $edit_permission) }}" name="slug"
                                        placeholder="Permission Slug">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 add_module d-none">
                                <div class="form-group">
                                    <label>Add New Module</label>
                                    <input type="text" class="form-control" name="new_module" id="module"
                                        placeholder="Module">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Select Module</label>
                                    <select onchange="enableAddModule(event)" class="form-control" name="module"
                                        id="module" id="">
                                        <option value="" selected>Select Module</option>
                                        <option value="1" class="text-primary">Add New Module</option>
                                        @foreach ($permissions as $permission)
                                            <option {{ $edit_permission->module == $permission->module ? 'Selected' : '' }}
                                                value="{{ $permission->module }}">{{ $permission->module }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2"
                                    type="submit">{{ $button }}</button>
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
            str = str.replace(/[^a-zA-Z0-9\s]/g, "");
            // $('#name').val(str);
            str = str.toLowerCase();
            str = str.replace(/\s/g, '-');
            $('#slug').val(str);
        }
    </script>
@endsection
