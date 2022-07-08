<div class="modal fade" id="CategoryAddModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" id="name" value="" class="form-control" name="name"
                                    placeholder="Role Name">
                            </div>
                            <div class="form-group">
                                <label>Sort Order</label>
                                <input type="number" id="sort_order" value="" class="form-control" name="sort_order"
                                    placeholder="Sort Order">
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox"  name="is_active"
                                            class="custom-control-input"
                                            id="is_active">
                                        <label class="custom-control-label "
                                            for="is_active">Active</label>
                                    </div>
                            <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox"  name="is_featured"
                                            class="custom-control-input"
                                            id="is_featured">
                                        <label class="custom-control-label "
                                            for="is_featured">Featured</label>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Edit Model --}}
<div class="modal fade" id="CategoryEditModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                 <form  method="POST" id="edit_role_form">
                @csrf
                <input type="hidden" name="id" id="category_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" id="edit_name" value="" class="form-control edit_name" name="name"
                                    placeholder="Role Name">
                            </div>
                             <div class="form-group">
                                <label>Sort Order</label>
                                <input type="number" id="edit_sort_order" value="" class="form-control edit_sort_order" name="sort_order"
                                    placeholder="Sort Order">
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox"  name="is_active"
                                            class="custom-control-input edit_is_active"
                                            id="edit_is_active">
                                        <label class="custom-control-label "
                                            for="edit_is_active">Active</label>
                                    </div>
                            <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox"  name="is_featured"
                                            class="custom-control-input edit_is_featured"
                                            id="edit_is_featured">
                                        <label class="custom-control-label "
                                            for="edit_is_featured">Featured</label>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


