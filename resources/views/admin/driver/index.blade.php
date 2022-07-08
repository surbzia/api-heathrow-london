@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Drivers</h5>
            <a class="btn btn-info btn-md rounded-pill" href="{{ route('driver.create') }}">Add Driver</a>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Unique Id</th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Country</th>

                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($drivers as $key => $driver)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $driver['unique_id'] }}</td>
                                    <td>{{ $driver['title'] }}</td>
                                    <td>{{ $driver['first_name'] . ' ' . $driver['last_name'] }}</td>
                                    <td>{{ $driver['email'] }}</td>
                                    <td>{{ $driver['city'] }}</td>
                                    <td>{{ $driver['country'] }}</td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $driver['is_active'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $driver['is_active'] == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('driver.edit', $driver['id']) }}">Edit</a>

                                        <form method="post" action="{{ route('driver.destroy', $driver['id']) }}"
                                            id="driver_delete_form">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill"
                                                onclick="deleteItem(event)">Delete</button>
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
    @include('admin.category.model')
@endsection
@section('script')
    <script>
        function deleteItem(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this driver.??')) {
                $('#driver_delete_form').submit();
            }

        }
    </script>
@endsection
