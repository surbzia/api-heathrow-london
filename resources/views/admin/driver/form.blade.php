@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('vehicle.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            {{-- <div class="card mb-30 card-border"> --}}
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <label class="text-danger border-bottom col-md-12">Basic Details</label>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" id="title"
                                                value="{{ old('title', $edit_driver['title']) }}"
                                                class="form-control @error('title') is-invalid @enderror"" name="title"
                                                placeholder="Title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="first_name"
                                                value="{{ old('first_name', $edit_driver['first_name']) }}"
                                                class="form-control @error('first_name') is-invalid @enderror""
                                                name="first_name" placeholder="First Name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" id="last_name"
                                                value="{{ old('last_name', $edit_driver['last_name']) }}"
                                                class="form-control" name="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email"
                                                value="{{ old('email', $edit_driver['email']) }}" class="form-control "
                                                name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Contact No.</label>
                                            <input type="number" id="mobile_num"
                                                value="{{ old('mobile_num', $edit_driver['mobile_num']) }}"
                                                class="form-control" name="mobile_num" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Emergency No.</label>
                                            <input type="number" id="emergency_num"
                                                value="{{ old('emergency_num', $edit_driver['emergency_num']) }}"
                                                class="form-control" name="emergency_num" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Tele. No</label>
                                            <input type="number" id="telephone_num"
                                                value="{{ old('telephone_num', $edit_driver['telephone_num']) }}"
                                                class="form-control" name="telephone_num" placeholder="Telephone Number">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" id="company_name"
                                                value="{{ old('company_name', $edit_driver['company_name']) }}"
                                                class="form-control" name="company_name" placeholder="Company Name">

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" id="description"
                                                value="{{ old('description', $edit_driver['description']) }}"
                                                class="form-control" name="description" placeholder="Description">

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" id="address"
                                                value="{{ old('address', $edit_driver['address']) }}"
                                                class="form-control" name="address" placeholder="Address">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" id="city"
                                                value="{{ old('city', $edit_driver['city']) }}" class="form-control"
                                                name="city" placeholder="City">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>County</label>
                                            <input type="text" id="county"
                                                value="{{ old('county', $edit_driver['county']) }}"
                                                class="form-control" name="county" placeholder="County">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" id="country"
                                                value="{{ old('country', $edit_driver['country']) }}"
                                                class="form-control" name="country" placeholder="Country">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input type="text" id="post_code"
                                                value="{{ old('post_code', $edit_driver['post_code']) }}"
                                                class="form-control" name="post_code" placeholder="Post Code">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 ">
                                <div class="row card p-3">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Unique Id</label>
                                            <input type="text" id="unique_id"
                                                value="{{ old('unique_id', $edit_driver['unique_id']) }}"
                                                class="form-control" name="unique_id" placeholder="Unique Id">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Commission</label>
                                            <input type="number" id="commission" min="0"
                                                value="{{ old('commission', $edit_driver['commission']) }}"
                                                class="form-control" name="commission" placeholder="Commission">
                                        </div>
                                    </div>
                                </div>
                                <div class="row card p-3">
                                    <label class="text-danger border-bottom">Vehicle Details</label>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Vehicle Make</label>
                                            <input type="text" id="vehicle_make" min="0"
                                                value="{{ old('vehicle_make', $edit_driver['vehicle_make']) }}"
                                                class="form-control" name="vehicle_make" placeholder="Vehicle Make">
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Model</label>
                                            <input type="text" id="vehicle_model" min="0"
                                                value="{{ old('vehicle_model', $edit_driver['vehicle_model']) }}"
                                                class="form-control" name="vehicle_model" placeholder="Vehicle Model">
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Body Type</label>
                                            <input type="text" id="vehicle_body_type" min="0"
                                                value="{{ old('vehicle_body_type', $edit_driver['vehicle_body_type']) }}"
                                                class="form-control" name="vehicle_body_type"
                                                placeholder="Vehicle Body Type">
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Color</label>
                                            <input type="text" id="vehicle_color" min="0"
                                                value="{{ old('vehicle_color', $edit_driver['vehicle_color']) }}"
                                                class="form-control" name="vehicle_color" placeholder="Vehicle Color">
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Plates</label>
                                            <input type="text" id="vehicle_plates" min="0"
                                                value="{{ old('vehicle_plates', $edit_driver['vehicle_plates']) }}"
                                                class="form-control" name="vehicle_plates" placeholder="Vehicle Plates">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mb-4">
                                    <label class="text-danger border-bottom col-md-12">Other Details</label>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Driving License</label>
                                            <input type="text" id="driving_license"
                                                value="{{ old('driving_license', $edit_driver['driving_license']) }}"
                                                class="form-control @error('driving_license') is-invalid @enderror""
                                                name="driving_license">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Driving License Expiry Date</label>
                                            <input type="date" id="driving_license_expiry_date"
                                                value="{{ old('driving_license_expiry_date', $edit_driver['driving_license_expiry_date']) }}"
                                                class="form-control @error('driving_license_expiry_date') is-invalid @enderror""
                                                name="driving_license_expiry_date">
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>POC License</label>
                                            <input type="text" id="pco_license"
                                                value="{{ old('pco_license', $edit_driver['pco_license']) }}"
                                                class="form-control @error('pco_license') is-invalid @enderror""
                                                name="pco_license">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>POC License Expiry Date</label>
                                            <input type="date" id="pco_license_expiry_date"
                                                value="{{ old('pco_license_expiry_date', $edit_driver['pco_license_expiry_date']) }}"
                                                class="form-control @error('pco_license_expiry_date') is-invalid @enderror""
                                                name="pco_license_expiry_date">
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>PHV License</label>
                                            <input type="text" id="phv_license"
                                                value="{{ old('phv_license', $edit_driver['phv_license']) }}"
                                                class="form-control @error('phv_license') is-invalid @enderror""
                                                name="phv_license">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>PHV License Expiry Date</label>
                                            <input type="date" id="phv_license_expiry_date"
                                                value="{{ old('phv_license_expiry_date', $edit_driver['phv_license_expiry_date']) }}"
                                                class="form-control @error('phv_license_expiry_date') is-invalid @enderror""
                                                name="phv_license_expiry_date">
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>MOT License</label>
                                            <input type="text" id="mot_license"
                                                value="{{ old('mot_license', $edit_driver['mot_license']) }}"
                                                class="form-control @error('mot_license') is-invalid @enderror""
                                                name="mot_license">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>MOT License Expiry Date</label>
                                            <input type="date" id="mot_license_expiry_date"
                                                value="{{ old('mot_license_expiry_date', $edit_driver['mot_license_expiry_date']) }}"
                                                class="form-control @error('mot_license_expiry_date') is-invalid @enderror""
                                                name="mot_license_expiry_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>MOT License Expiry Time</label>
                                            <input type="date" id="mot_license_expiry_time"
                                                value="{{ old('mot_license_expiry_time', $edit_driver['mot_license_expiry_time']) }}"
                                                class="form-control @error('mot_license_expiry_time') is-invalid @enderror""
                                                name="mot_license_expiry_time">
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <input type="text" id="insurance"
                                                value="{{ old('insurance', $edit_driver['insurance']) }}"
                                                class="form-control @error('insurance') is-invalid @enderror""
                                                name="insurance">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Insurance Expiry Date</label>
                                            <input type="date" id="insurance_expiry_date"
                                                value="{{ old('insurance_expiry_date', $edit_driver['insurance_expiry_date']) }}"
                                                class="form-control @error('insurance_expiry_date') is-invalid @enderror""
                                                name="insurance_expiry_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Insurance Expiry Time</label>
                                            <input type="time" id="insurance_expiry_time"
                                                value="{{ old('insurance_expiry_time', $edit_driver['insurance_expiry_time']) }}"
                                                class="form-control @error('insurance_expiry_time') is-invalid @enderror""
                                                name="insurance_expiry_time">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>National Insurance No.</label>
                                            <input type="text" id="national_insurance_num"
                                                value="{{ old('national_insurance_num', $edit_driver['national_insurance_num']) }}"
                                                class="form-control" placeholder="National Insurance No"
                                                name="national_insurance_num">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Bank Account</label>
                                            <input type="text" id="bank_account"
                                                value="{{ old('bank_account', $edit_driver['bank_account']) }}"
                                                class="form-control" placeholder="Bank Account" name="bank_account">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" {{ $edit_driver['is_active'] == 1 ? 'Checked' : '' }}
                                                name="is_active" class="custom-control-input is_active" id="is_active">
                                            <label class="custom-control-label " for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 col-sm-12">
                                    <button class="btn btn-primary btn-md rounded-pill"
                                        type="submit">{{ $button }}</button>
                                </div>
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
