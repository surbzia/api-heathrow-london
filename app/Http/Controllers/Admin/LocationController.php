<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('category')->get();
        return view('admin.location.index')->with(compact('locations'));
    }
    public function getLocation()
    {
        $location = Location::query();
        $location = $location->get(['id', 'full_address as address'])->toArray();
        return response()->json($location);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $obj = new User();
        $data = [
            'is_edit' => false,
            'title' => 'Add Location',
            'button' => 'Submit',
            'route' => route('location.store'),
            'categories' => $categories,
            'edit_location' => $obj,
        ];
        return view('admin.location.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        Location::create($request);

        return redirect()->route('location.index')->with('success', 'Location has been added successfully');
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
    public function edit(Location $location)
    {
        $categories = Category::where('is_active', 1)->get();
        $data = [
            'is_edit' => true,
            'title' => 'Update Location',
            'button' => 'Update',
            'route' => route('location.update', $location->id),
            'categories' => $categories,
            'edit_location' => $location,
        ];
        return view('admin.location.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, Location $location)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $location->update($request);
        return redirect()->route('location.index')->with('success', 'Location has been deleted successfully');
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
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Location has been deleted successfully');
    }
}
