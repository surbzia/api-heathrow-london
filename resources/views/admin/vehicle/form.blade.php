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
                    {{-- @dd($edit_vehicle) --}}
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" id="name"
                                                value="{{ old('name', $edit_vehicle['name']) }}"
                                                class="form-control @error('name') is-invalid @enderror"" name="name"
                                                placeholder="Display Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Disable Info</label>
                                            <input type="text" id="disable_info"
                                                class="form-control @error('disable_info') is-invalid @enderror""
                                                value="{{ old('disable_info', $edit_vehicle['disable_info']) }}"
                                                name="disable_info" placeholder="Disable Info">
                                            @error('disable_info')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" placeholder="Description" id="description"
                                                class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description', $edit_vehicle['description']) }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Max Vehicle Amount</label>
                                            <input type="number" id="max_vehicle_amount" class="form-control"
                                                value="{{ old('max_vehicle_amount', $edit_vehicle['max_vehicle_amount']) }}"
                                                name="max_vehicle_amount" placeholder="Max Vehicle Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Passengers</label>
                                            <input type="number" id="passengers" class="form-control "
                                                value="{{ old('passengers', $edit_vehicle['passengers']) }}"
                                                name="passengers" placeholder="Passengers">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Luggage</label>
                                            <input type="number" id="luggage" class="form-control "
                                                value="{{ old('luggage', $edit_vehicle['luggage']) }}" name="luggage"
                                                placeholder="Luggage">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Hand Luggage</label>
                                            <input type="number" id="hand_luggage" class="form-control "
                                                value="{{ old('hand_luggage', $edit_vehicle['hand_luggage']) }}"
                                                name="hand_luggage" placeholder="Hand Luggage">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Child Seats</label>
                                            <input type="number" id="child_seats" class="form-control "
                                                value="{{ old('child_seats', $edit_vehicle['child_seats']) }}"
                                                name="child_seats" placeholder="Child Seats">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Baby Seats</label>
                                            <input type="number" id="baby_seats" class="form-control "
                                                value="{{ old('baby_seats', $edit_vehicle['baby_seats']) }}"
                                                name="baby_seats" placeholder="Baby Seats">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Wheel Chairs</label>
                                            <input type="number" id="wheel_chairs" class="form-control "
                                                value="{{ old('wheel_chairs', $edit_vehicle['wheel_chairs']) }}"
                                                name="wheel_chairs" placeholder="Wheel Chairs">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Sort Order</label>
                                            <input type="number" id="sort_order" class="form-control "
                                                value="{{ old('sort_order', $edit_vehicle['sort_order']) }}"
                                                name="sort_order" placeholder="Sort Order">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="car-image">
                                            {{-- @dd($edit_vehicle) --}}
                                            @php
                                                $src = $is_edit ? $edit_vehicle['image_url'] : '#';
                                            @endphp
                                            <img src="{{ $src }}" alt="" class=""
                                                id="carImage">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" id="image"
                                                class="form-control @error('image') is-invalid @enderror"
                                                onchange="displayImage(event)" value="" name="image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Rate Per Hour</label>
                                            <input type="number" id="rate_per_hour" class="form-control "
                                                value="{{ old('rate_per_hour', $edit_vehicle['rate_per_hour']) }}"
                                                name="rate_per_hour" placeholder="Rate Per Hour">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Rate Per Day</label>
                                            <input type="number" id="rate_per_day" class="form-control "
                                                value="{{ old('rate_per_day', $edit_vehicle['rate_per_day']) }}"
                                                name="rate_per_day" placeholder="Rate Per Day">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Rate Per Mile</label>
                                            <input type="number" id="rate_per_mile" class="form-control "
                                                value="{{ old('rate_per_mile', $edit_vehicle['rate_per_mile']) }}"
                                                name="rate_per_mile" placeholder="Rate Per Mile">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" {{ $edit_vehicle['is_active'] == 1 ? 'Checked' : '' }}
                                                    name="is_active" class="custom-control-input is_active"
                                                    id="is_active">
                                                <label class="custom-control-label " for="is_active">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox"
                                                    {{ $edit_vehicle['is_default'] == 1 ? 'Checked' : '' }} name="is_default"
                                                    class="custom-control-input is_default" id="is_default">
                                                <label class="custom-control-label " for="is_default">Default</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-md rounded-pill"
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
        function displayImage(event) {
            var output = document.getElementById('carImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
    </script>
@endsection
