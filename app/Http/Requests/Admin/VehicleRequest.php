<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = null;
        if ($this->route('vehicle') != null) {
            $id = $this->route('vehicle')->id;
        }

        return [
            'name' =>     'required|unique:vehicles,name,' . $id,
        ];
    }
}
