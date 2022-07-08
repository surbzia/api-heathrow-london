<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Location;
use App\Models\PaymentType;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_customer', 0)->get();
        return view('admin.booking.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $locations = Location::all();
        $vehicles = Vehicle::active()->get()->toArray();
        $paymentTypes = PaymentType::active()->get()->toArray();
        $data = [
            'locations' => $locations,
            'vehicles' => $vehicles,
            'paymentTypes' => $paymentTypes,
        ];
        return view('admin.booking.form')->with($data);
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
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $user = User::create($request);

        $user->syncRoles($request['role']);
        return redirect()->route('user.index')->with('status', 'User has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.booking.view')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $data = [
            'is_edit' => true,
            'title' => 'Update User',
            'button' => 'Update',
            'route' => route('user.update', $user->id),
            'roles' => $roles,
            'edit_user' => $user,
        ];
        return view('admin.user.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $user->update($request);
        $user->syncRoles($request['role']);
        return redirect()->route('user.index')->with('success', 'User has been updated successfully');
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!is_null($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return redirect()->back()->with('success', 'Profile has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $permission)
    {
        $permission->delete();
        return redirect()->route('user.index')->with('success', 'Permission has been deleted successfully');
    }
}
