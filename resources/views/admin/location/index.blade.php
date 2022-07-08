@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Locations</h5>
               <a class="btn btn-info btn-md rounded-pill" href="{{ route('location.create') }}">Add Location</a>
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
                                <th>Category</th>
                                <th>Post Code</th>
                                <th>Full Address</th>
                                <th>Sort Order</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($locations as $key => $location)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->category->name }}</td>
                                    <td>{{ $location->post_code }}</td>
                                    <td>{{ $location->full_address }}</td>
                                    <td>{{ $location->sort_order }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $location->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $location->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                      <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('location.edit', $location->id) }}">Edit</a>

                                        <form method="post" action="{{ route('location.destroy', $location->id) }}" id="location_delete_form">
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
            if(confirm('Are you sure you want to delete this Location.??')){
                $('#location_delete_form').submit();
            }

        }
    </script>
@endsection
