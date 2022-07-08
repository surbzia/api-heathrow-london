@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Payments</h5>
            <a class="btn btn-info btn-md rounded-pill" href="{{ route('payment.create') }}">Add Payment Type</a>
        </div>
        <hr>
        <div class="col-md-12">
            {{-- <div class="card-box mb-30 card-border" style="margin-right: 64px;"> --}}
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Default</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payment_types as $key => $payment_type)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $payment_type->image_url }}" alt="" class="" width="70px">
                                    </td>
                                    <td>{{ $payment_type->name }}</td>
                                    <td>{{ $payment_type->description }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $payment_type->is_default == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $payment_type->is_default == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $payment_type->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $payment_type->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('payment.edit', $payment_type->id) }}">Edit</a>

                                        <form method="post" action="{{ route('payment.destroy', $payment_type->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
