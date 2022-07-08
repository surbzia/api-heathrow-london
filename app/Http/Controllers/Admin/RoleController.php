<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Role::distinct()->get('module');
        $obj = new Role();
        $data = [
            'is_edit' => false,
            'title' => 'Add Permission',
            'button' => 'Submit',
            'route' => route('permission.create'),
            'permissions' => $permissions,
            'edit_permission' => $obj,
        ];
        return view('admin.permissions.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        Role::create($request);
        return redirect()->route('role.index')->with('status', 'Role has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Role $role)
    {
        $permissions = Permission::all()->groupBy('module');
        $data=[
            'role' =>   $role,
          'role_permissions' =>   $role->permissions->pluck('id'),
          'permissions' =>   $permissions,
        ];
        return view('admin.roles.permissions')->with($data);
}
    public function update_permissions(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->role_permissions);
        return redirect()->route('role.index')->with('status', 'Permissions has been updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $permission)
    {
        $permissions = Role::distinct()->get('module');
        $data = [
            'is_edit' => true,
            'title' => 'Update Permission',
            'button' => 'Update',
            'route' => route('permission.update', $permission->id),
            'permissions' => $permissions,
            'edit_permission' => $permission,
        ];
        return view('admin.permissions.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);
        // $request = $request->all();

        // if (isset($request['new_module'])) {
        //     $request['module'] = $request['new_module'];
        // }
        // $permission->update($request);
        // return redirect()->route('permission.index')->with('status', 'Permission has been updated successfully');
    }
    public function update_role(Request $request)
    {
        Role::find($request->id)->update(['name' => $request->name]);
        return redirect()->route('role.index')->with('status', 'Role has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('status', 'Role has been deleted successfully');
    }
}
