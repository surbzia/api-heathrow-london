<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Driver;
use App\Models\User;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('is_customer', 1)->get();
        return view('admin.customer.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new User();
        $data = [
            'is_edit' => false,
            'title' => 'Add Customer',
            'button' => 'Submit',
            'route' => route('customer.store'),
            'edit_customer' => $obj,
        ];
        return view('admin.customer.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_customer'] = 1;
        $user = User::create($request);

        return redirect()->route('user.index')->with('success', 'Customer has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update User',
            'button' => 'Update',
            'route' => route('customer.update', $customer->id),
            'edit_customer' => $customer,
        ];
        return view('admin.customer.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, User $customer)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_customer'] = 1;
        $customer->update($request);
        return redirect()->route('customer.index')->with('success', 'Customer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer has been deleted successfully');
    }
}
