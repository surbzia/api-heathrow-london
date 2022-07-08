@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('user.index') }}">back</a>
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
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    {{-- <input type="text" id="title"
                                        value="{{ old('title', $edit_user) }}"
                                        class="form-control @error('title') is-invalid @enderror"" name="title"
                                        placeholder="First Name">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    <select name="title" class="form-control" id="title">
                                        <option value="Mr">Mr</option>
                                        <option value="Mr">Mrs</option>
                                        <option value="Mr">Miss</option>
                                        <option value="Mr">Dr</option>
                                        <option value="Mr">Sir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" id="first_name"
                                        value="{{ old('first_name', $edit_user) }}"
                                        class="form-control @error('first_name') is-invalid @enderror"" name="first_name"
                                        placeholder="First Name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="last_name"
                                        value="{{ old('last_name', $edit_user) }}"
                                        class="form-control @error('last_name') is-invalid @enderror"" name="last_name"
                                        placeholder="Last Name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="email"
                                        class="form-control @error('email') is-invalid @enderror""
                                        value="{{ old('email', $edit_user) }}" name="email" placeholder="User Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    {{-- <input type="text" id="description"
                                        class="form-control"
                                        value="{{ old('description', $edit_user) }}" name="description" placeholder="Description"> --}}
                                    <textarea name="description" id="description" class="form-control" cols="10" rows="5">
                                       {{ old('description', $edit_user) }}
                                    </textarea>
                                </div>
                            </div>

                             <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Contact No.</label>
                                            <input type="number" id="mobile_num"
                                                value="{{ old('mobile_num', $edit_user) }}"
                                                class="form-control" name="mobile_num" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Emergency No.</label>
                                            <input type="number" id="emergency_num"
                                                value="{{ old('emergency_num', $edit_user) }}"
                                                class="form-control" name="emergency_num" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Tele. No</label>
                                            <input type="number" id="telephone_num"
                                                value="{{ old('telephone_num', $edit_user) }}"
                                                class="form-control" name="telephone_num" placeholder="Telephone Number">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" id="company_name"
                                                value="{{ old('company_name', $edit_user) }}"
                                                class="form-control" name="company_name" placeholder="Company Name">

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" id="address"
                                                value="{{ old('address', $edit_user) }}"
                                                class="form-control" name="address" placeholder="Address">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" id="city"
                                                value="{{ old('city', $edit_user) }}" class="form-control"
                                                name="city" placeholder="City">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>County</label>
                                            <input type="text" id="county"
                                                value="{{ old('county', $edit_user) }}"
                                                class="form-control" name="county" placeholder="County">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" id="country"
                                                value="{{ old('country', $edit_user) }}"
                                                class="form-control" name="country" placeholder="Country">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input type="text" id="post_code"
                                                value="{{ old('post_code', $edit_user) }}"
                                                class="form-control" name="post_code" placeholder="Post Code">

                                        </div>
                                    </div>



                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select
                                        class="form-control @error('role') is-invalid @enderror"" name="role"
                                        id="role" id="">
                                        <option value="" selected>Select Role</option>
                                        @foreach ($roles as $role)
                                        @php
                                            $selected = $is_edit && count($edit_user->roles) > 0 && $edit_user->roles->pluck('id')[0] == $role->id ? 'Selected' : '';
                                        @endphp
                                            <option
                                                {{$selected }}
                                                value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" id="password"
                                        class="form-control @error('password') is-invalid @enderror"" value=""
                                        name="password" placeholder="Password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" id="confirm_password" class="form-control" value=""
                                        name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                @php
                                    $checked = $is_edit && $edit_user->is_active == 1 ?'checked' : ''
                                @endphp
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mt-30">
                                        <input type="checkbox" {{ $checked}}   name="is_active"
                                            class="custom-control-input is_active"
                                            id="is_active">
                                        <label class="custom-control-label "
                                            for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-md  rounded-pill col-md-2"
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
    </script>
@endsection
