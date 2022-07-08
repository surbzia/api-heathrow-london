<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\VehicleRequest;
use App\Models\Category;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    protected $file;
    public function __construct(FileRepository $file)
    {
        $this->file = $file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all()->toArray();
        return view('admin.driver.index')->with(compact('drivers'));
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
            'title' => 'Add Vehicle',
            'button' => 'Submit',
            'route' => route('driver.store'),
            'edit_driver' => $obj,
        ];

        return view('admin.driver.form')->with($data);
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
        Driver::create($request);

        return redirect()->route('driver.index')->with('success', 'Driver has been added successfully');
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
    public function edit(Driver $driver)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update Driver',
            'button' => 'Update',
            'route' => route('driver.update', $driver->id),
            'edit_driver' => $driver->toArray(),
        ];
        return view('admin.driver.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $driver->update($request);
        return redirect()->route('driver.index')->with('success', 'Driver has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('driver.index')->with('success', 'Driver has been deleted successfully');
    }
}
