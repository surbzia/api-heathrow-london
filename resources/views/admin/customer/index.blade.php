@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Customers</h5>
            <a class="btn btn-info btn-md rounded-pill" href="{{ route('customer.create') }}">Add Customer</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($customers as $key => $customer)
                                @php
                                    $role = count($customer->getRoleNames()) > 0 ? $customer->getRoleNames()[0] : 'Not Assigned';
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $customer->title }}. {{ $customer->first_name }} {{ $customer->last_name }}
                                    </td>
                                    <td>{{ $customer->email }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $customer->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $customer->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('customer.edit', $customer->id) }}">Edit</a>

                                        <form method="post" action="{{ route('customer.destroy', $customer->id) }}">
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
