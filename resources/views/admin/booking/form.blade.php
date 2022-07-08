@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Create Booking</h5>
            <button class="btn btn-primary btn-md rounded-pill col-md-2" form="booking-form" type="submit">Create
                Booking</button>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('booking.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Travelling From</label>
                                            <select name="from" form="booking-form" id="from" name="from"
                                                class="custom-select2 form-control @error('from') is-invalid @enderror">
                                                <option value="">Select From Address</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->full_address }}
                                                        <span>{{ $location->category->name }}</span>
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('from')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Travelling To</label>
                                            <select name="to" form="booking-form" id="to" name="to"
                                                class="custom-select2  form-control @error('to') is-invalid @enderror">
                                                <option value="">Select To Address</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->full_address }}
                                                        <span>{{ $location->category->name }}</span>
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('to')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Travelling Date</label>
                                            <input type="date" form="booking-form" id="date_of_travelling"
                                                value="{{ now() }}"
                                                class="form-control @error('date_of_travelling') is-invalid @enderror""
                                                name="date_of_travelling" placeholder="Last Name">
                                            @error('date_of_travelling')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row ml-0 p-2">
                                            <div class="col-md-12">
                                                <div class="vehicle-slider">
                                                    @foreach ($vehicles as $vehicle)
                                                        <div>
                                                            <div class="col-md-12  col-sm-12 card p-3"><label
                                                                    for="">{{ $vehicle['name'] }}
                                                                    <select name="vehicle_count"
                                                                        onchange="getVehicleData(event,{{ json_encode($vehicle) }})"
                                                                        form="booking-form" id=""
                                                                        class="form-control p-0 float-right vehicle-{{ $vehicle['id'] }}"
                                                                        style=" width: 50px;">
                                                                        @for ($i = 0; $i < 50; $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }}
                                                                            </option>
                                                                        @endfor
                                                                    </select></label>
                                                                <img src="{{ $vehicle['image_url'] }}" alt=""
                                                                    style="height: 70px !important">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Passengers</label>
                                            <select name="passengers" form="booking-form" id="passengers"
                                                class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Luggage</label>
                                            <select name="luggage" form="booking-form" id="luggage"
                                                class="form-control luggage">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Carry-on</label>
                                            <select name="carry_on" form="booking-form" id="carry_on" class="form-control">
                                                <option value="0">0</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="text-danger border-bottom col-md-12">Customer</label>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="customer_title" form="booking-form"
                                                id="customer_title" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="customer_name" form="booking-form"
                                                id="customer_name" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="customer_email" form="booking-form"
                                                id="customer_email" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="text" name="customer_phone" form="booking-form"
                                                id="customer_phone" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <label class="text-danger border-bottom col-md-12 mt-3">Lead Passenger</label>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="lead_passenger_title" form="booking-form"
                                                id="lead_passenger_title" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="lead_passenger_name" form="booking-form"
                                                id="lead_passenger_name" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="lead_passenger_email" form="booking-form"
                                                id="lead_passenger_email" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="text" name="lead_passenger_phone" form="booking-form"
                                                id="lead_passenger_phone" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Special requirements</label>
                                            <input type="text" name="special_requirment" form="booking-form"
                                                id="special_requirment" class="form-control float-right ">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="row card p-2 pt-3">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Flight number</label>
                                            <input type="text" name="flight_number" form="booking-form"
                                                id="flight_number" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Arriving from</label>
                                            <input type="text" name="arriving_from" form="booking-form"
                                                id="arriving_from" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>How many minutes after landing?</label>
                                            <input type="number" name="min_after_landing" form="booking-form"
                                                id="min_after_landing" class="form-control float-right ">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meet and greet</label>
                                            <select class="form-control float-right " name="meet_and_greet"
                                                form="booking-form" id="meet_and_greet">
                                                <option value="" selected="">No, Thanks</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meeting point</label>
                                            <textarea name="meeting_point" style="height: 100px;" form="booking-form" id="meeting_point"
                                                class="form-control float-right " cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <label class="text-danger border-bottom col-md-12 mt-3">Payment Type</label>
                                    <div class="col-md-12 col-sm-12 p-3">
                                        <div class="form-group">
                                            @foreach ($paymentTypes as $paymentType)
                                                <div class="custom-control custom-radio mb-5">
                                                    <input type="radio" id="payment-type-{{ $paymentType['id'] }}"
                                                        form="booking-form" name="payment_type"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="payment-type-{{ $paymentType['id'] }}">{{ $paymentType['name'] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
    <script>
        function getVehicleData(event, data) {
            let max_passengers = data.passengers;
            let max_luggage = data.luggage;
            let vehicle_count = event.target.value;

            let passengers = vehicle_count * max_passengers;
            let luggage = vehicle_count * max_luggage;

            $('#luggage').html('');
            for (var n = 0; n <= luggage; ++n) {
                $('#luggage').append(`<option value="${n}">${n}</option>`);
            };
            $('#passengers').html('');
            for (var n = 0; n <= passengers; ++n) {
                $('#passengers').append(`<option value="${n}">${n}</option>`);
            };
        }
    </script>
@endsection
