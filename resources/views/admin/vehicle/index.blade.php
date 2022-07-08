@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Vehicles</h5>
               <a class="btn btn-info btn-md rounded-pill" href="{{ route('vehicle.create') }}">Add Vehicle</a>
        </div>
        <hr>
        <div class="col-md-12">
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20" >
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Disable Info</th>
                                <th>Passengers</th>
                                <th>Max Vehicle Amount</th>
                                <th>Luggage</th>
                                <th>Hand Luggage</th>
                                <th>Child Seats</th>
                                <th>Baby Seats</th>
                                <th>Wheel Chairs</th>
                                <th>Sort Order</th>
                                <th>Default</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($vehicles as $key => $vehicle)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $vehicle['name'] }}</td>
                                    <td>{{ $vehicle['description'] }}</td>
                                    <td>{{ $vehicle['disable_info'] }}</td>
                                      <td>{{ $vehicle['passengers'] }}</td>
                                    <td>{{ $vehicle['max_vehicle_amount'] }}</td>

                                    <td>{{ $vehicle['luggage'] }}</td>
                                    <td>{{ $vehicle['hand_luggage'] }}</td>
                                    <td>{{ $vehicle['child_seats'] }}</td>
                                    <td>{{ $vehicle['baby_seats'] }}</td>
                                    <td>{{ $vehicle['wheel_chairs'] }}</td>
                                    <td>{{ $vehicle['sort_order'] }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $vehicle['is_default'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $vehicle['is_default'] == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $vehicle['is_active'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $vehicle['is_active'] == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                      <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('vehicle.edit', $vehicle['id']) }}">Edit</a>

                                        <form method="post" action="{{ route('vehicle.destroy', $vehicle['id']) }}" id="vehicle_delete_form">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill"  onclick="deleteItem(event)">Delete</button>
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
              function deleteItem(event){
            event.preventDefault();
            if(confirm('Are you sure you want to delete this vehicle.??')){
                $('#vehicle_delete_form').submit();
            }

        }
    </script>
@endsection
