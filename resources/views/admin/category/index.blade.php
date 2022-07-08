@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Categories</h5>
             <button class="btn btn-info btn-md rounded-pill" data-toggle="modal" data-target="#CategoryAddModel" type="button">Add
                Category</button>
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
                                <th>Sort Order</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $key => $category)

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->sort_order }}</td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $category->is_featured == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->is_featured == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $category->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill" onclick="edit({{$category}})" href="javascript:;"
                                            data-role="{{ $category }}">Edit</a>

                                        <form method="post" action="{{ route('category.destroy', $category->id) }}" id="category_delete_form">
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
            function edit(category){
            $('.edit_name').val(category.name);
            $('.edit_sort_order').val(category.sort_order);
            $('.edit_is_active').prop('checked', false);
            $('.edit_is_featured').prop('checked', false);
            if(category.is_active == 1){
                $('.edit_is_active').prop('checked', true);
            }
            if(category.is_featured == 1){
                $('.edit_is_featured').prop('checked', true);
            }
            $('#category_id').val(category.id);
            let route = `{{ route('category.update_category') }}`;
            $('#edit_role_form').attr('action', route);
            $('#CategoryEditModel').modal('show');
        }
              function deleteItem(event){
            event.preventDefault();
            if(confirm('Are you sure you want to delete this Category.??')){
                $('#category_delete_form').submit();
            }

        }
    </script>
@endsection
