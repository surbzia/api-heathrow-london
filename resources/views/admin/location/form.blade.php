@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('location.index') }}">back</a>
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
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Display Name</label>
                                    <input type="text" id="name"
                                        value="{{ old('name', $edit_location->name) }}"
                                        id="address_name"
                                        class="form-control @error('name') is-invalid @enderror"" name="name"
                                        placeholder="Display Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Post Code</label>
                                    <input type="text" id="post_code"
                                        class="form-control @error('post_code') is-invalid @enderror""
                                        value="{{ old('post_code', $edit_location->post_code) }}" name="post_code" placeholder="Post Code">
                                    @error('post_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select
                                        class="form-control @error('category_id') is-invalid @enderror"" name="category_id"
                                        id="category_id" id="">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        @php
                                            $selected = $is_edit &&  $edit_location->category_id == $category->id ? 'Selected' : '';
                                        @endphp
                                            <option
                                                {{$selected }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label>Full Address</label>
                                    <input type="text" id="autocomplete"
                                        class="form-control @error('full_address') is-invalid @enderror"" value="{{ old('full_address', $edit_location->full_address) }}"
                                        name="full_address" placeholder="Full Address">
                                </div>
                                @error('full_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" id="latitude" name="latitude"  >
                            <input type="hidden" name="longitude" id="longitude">

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" id="number"
                                        class="form-control @error('sort_order') is-invalid @enderror"" value="{{ old('sort_order', $edit_location->sort_order) }}"
                                        name="sort_order" placeholder="Sort Order">
                                </div>
                                @error('sort_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" {{$edit_location->is_active == 1? 'Checked':''}}  name="is_active"
                                            class="custom-control-input is_active"
                                            id="is_active">
                                        <label class="custom-control-label "
                                            for="is_active">Active</label>
                                    </div>
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
{{-- @include('admin.partial.google-place-search') --}}
@section('script')
{{-- <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg=places"></script> --}}


    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key={{GoogleApiKey()}}&libraries=places"></script>
    <script>

    google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });
    }
</script>

@endsection
