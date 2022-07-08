<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentTypeRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Location;
use App\Models\PaymentType;
use App\Models\User;
use App\Models\Vehicle;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PaymentController extends Controller
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
        $payment_types = PaymentType::all();
        return view('admin.payment.index')->with(compact('payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new PaymentType();
        $data = [
            'is_edit' => false,
            'title' => 'Create Payment Type',
            'button' => 'Create',
            'route' => route('payment.store'),
            'edit_payment' => $obj,
        ];
        return view('admin.payment.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypeRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_default'] = (isset($request['is_default']) && $request['is_default']) == 'on' ? 1 : 0;
        $payment_type = PaymentType::create($request);
        if (isset($request['image'])) {
            $this->file->create([$request['image']], 'payment_types', $payment_type->id);
        }

        return redirect()->route('payment.index')->with('success', 'Payment Type has been added successfully');
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
    public function edit(PaymentType $payment)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update Payment Type',
            'button' => 'Update',
            'route' => route('payment.update', $payment->id),
            'edit_payment' => $payment,
        ];
        return view('admin.payment.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentTypeRequest $request, PaymentType $payment)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_default'] = (isset($request['is_default']) && $request['is_default']) == 'on' ? 1 : 0;
        $payment->update($request);
        if (isset($request['image'])) {
            $this->file->create([$request['image']], 'payment_types', $payment->id, 1);
        }
        return redirect()->route('payment.index')->with('success', 'Payment Type has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index')->with('success', 'Payment Type has been deleted successfully');
    }
}
