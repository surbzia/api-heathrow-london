<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\VehicleRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use App\Models\Vehicle;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;

class VehicleController extends Controller
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
        $vehicles = Vehicle::all()->toArray();
        return view('admin.vehicle.index')->with(compact('vehicles'));
    }
    public function getAllVehicle()
    {
        $vehicles = Vehicle::active()->get();
        return response()->json(['vehicles' => $vehicles]);
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
            'route' => route('vehicle.store'),
            'edit_vehicle' => $obj,
        ];
        return view('admin.vehicle.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_default'] = (isset($request['is_default']) && $request['is_default']) == 'on' ? 1 : 0;
        $vehicle = Vehicle::create($request);
        if (isset($request['image'])) {
            $this->file->create([$request['image']], 'vehicles', $vehicle->id);
        }

        return redirect()->route('vehicle.index')->with('success', 'Vehicle has been added successfully');
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
    public function edit(Vehicle $vehicle)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update Location',
            'button' => 'Update',
            'route' => route('vehicle.update', $vehicle->id),
            'edit_vehicle' => $vehicle->toArray(),
        ];
        return view('admin.vehicle.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {

        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_default'] = (isset($request['is_default']) && $request['is_default']) == 'on' ? 1 : 0;
        $vehicle->update($request);
        if (isset($request['image'])) {
            $this->file->create([$request['image']], 'vehicles', $vehicle->id, 1);
        }
        return redirect()->route('vehicle.index')->with('success', 'Vehicle has been deleted successfully');
    }

    public function update_category(Request $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_featured'] = (isset($request['is_featured']) && $request['is_featured']) == 'on' ? 1 : 0;

        Category::find($request['id'])->update($request);
        return redirect()->back()->with('success', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->file != null) {
            $vehicle->file->delete();
        }
        $vehicle->delete();
        return redirect()->route('vehicle.index')->with('success', 'Vehicle has been deleted successfully');
    }
}
