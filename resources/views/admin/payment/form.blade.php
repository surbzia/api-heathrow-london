@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{$title}}</h5>

            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('payment.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route}}" method="POST" id="payment-form" enctype="multipart/form-data">
                        @csrf
                         @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" form="payment-form" id="name"
                                                value="{{old('name',$edit_payment['name']) }}"
                                                class="form-control @error('name') is-invalid @enderror""
                                                name="name" placeholder="Last Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" form="payment-form" id="description"
                                                value="{{old('description',$edit_payment['description']) }}"
                                                class="form-control"
                                                name="description" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Params</label>
                                            <input type="text" form="payment-form" id="params"
                                                value="{{old('params',$edit_payment['params']) }}"
                                                class="form-control"
                                                name="params" placeholder="Params">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Sort Order</label>
                                            <input type="number" form="payment-form" id="sort_order"
                                                value="{{old('sort_order',$edit_payment['sort_order']) }}"
                                                class="form-control"
                                                name="sort_order" placeholder="Sort Order">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Factor Type</label>
                                            <input type="text" form="payment-form" id="factor_type"
                                                value="{{old('factor_type',$edit_payment['factor_type']) }}"
                                                class="form-control"
                                                name="factor_type" placeholder="Factor Type">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Factor Value</label>
                                            <input type="text" form="payment-form" id="factor_value"
                                                value="{{old('factor_value',$edit_payment['factor_value']) }}"
                                                class="form-control"
                                                name="factor_value" placeholder="Factor Value">
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="car-image">
                                            @php
                                                $src = $is_edit ? $edit_payment['image_url'] : '#';
                                            @endphp
                                            <img src="{{ $src }}" alt="" class=""
                                                id="paymentImage">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" id="image"
                                                class="form-control"
                                                onchange="displayImage(event)" value="" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" {{ $edit_payment['is_active'] == 1 ? 'Checked' : '' }}
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
                                                    {{ $edit_payment['is_default'] == 1 ? 'Checked' : '' }} name="is_default"
                                                    class="custom-control-input is_default" id="is_default">
                                                <label class="custom-control-label " for="is_default">Default</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

 <button class="btn btn-primary btn-md rounded-pill col-md-2" form="payment-form" type="submit"> {{$button}}</button>
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
            var output = document.getElementById('paymentImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
    </script>
@endsection
