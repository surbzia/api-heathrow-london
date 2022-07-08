@extends('admin.layouts.app')

@section('content')
    <div class="row">
          <div class="col-md-12">
            <h5 class="float-left">View Booking</h5>
            <a class="btn btn-dark btn-sm rounded-pill float-right " href="{{ route('booking.index') }}">back</a>

            <div class="form-group col-md-3 float-right " style="margin-bottom: -1px !important;">
                <select class="form-control " name="meet_and_greet" form="booking-form" id="meet_and_greet">
                    <option value="" selected="">Update Booking Status</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="col-md-12 mt-3">
            <div class="card-box height-100-p widget-style1">
                <div class="row p-2">
                    <div class="col-md-6 col-sm-6">
                        <label><b>To : </b> <span>Stansted Airport </span> </label> <br>
                        <label><b>From :  </b> <span> Heathrow Terminal 2 </span> </label> <br>
                        <label><b>Vehicle :  </b> <span>Mercedes E-class </span> </label> <br>
                        <label><b>Driver :  </b> <span>Mr. John Watch </span> </label>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label><b>Status : </b> <span class="text-danger">Requested</span></label> <br>
                        <label><b>Booking Date : </b><span class="text-danger">Requested</span></label><br>
                        <label><b>Travelling Date :  </b> <span> ladsuk alsdfhiankl asduadsjfaidsfkl asd </span> </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
