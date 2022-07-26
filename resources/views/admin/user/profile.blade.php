@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Profile</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('user.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            {{-- <div class="card mb-30 card-border"> --}}
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{route('update_profile',Auth::user()->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    {{-- <input type="text" id="first_name" onkeyup="generateSlug(event)"
                                        value="{{ old('first_name',Auth::user()->first_name) }}" class="form-control" name="first_name"
                                        placeholder="First Name"> --}}
                                           <select name="title" class="form-control" id="title">

                                        <option {{ Auth::user()->title  == 'Mr' ? 'selected' : ''}} value="Mr">Mr</option>
                                        <option  {{ Auth::user()->title  == 'Mrs' ? 'selected' : ''}} value="Mrs">Mrs</option>
                                        <option  {{ Auth::user()->title  == 'Miss' ? 'selected' : ''}} value="Miss">Miss</option>
                                        <option  {{ Auth::user()->title  == 'Dr' ? 'selected' : ''}} value="Dr">Dr</option>
                                        <option  {{ Auth::user()->title  == 'Sir' ? 'selected' : ''}} value="Sir">Sir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" id="first_name" onkeyup="generateSlug(event)"
                                        value="{{ old('first_name',Auth::user()->first_name) }}" class="form-control" name="first_name"
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="last_name" onkeyup="generateSlug(event)"
                                        value="{{ old('last_name',Auth::user()->last_name) }}" class="form-control" name="last_name"
                                        placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="email" class="form-control"
                                        value="{{ old('email',Auth::user()->email) }}" disabled name="email"
                                        placeholder="User Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" id="password" class="form-control"
                                        value="" name="password"
                                        placeholder="Password">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2"
                                    type="submit">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script></script>
@endsection
