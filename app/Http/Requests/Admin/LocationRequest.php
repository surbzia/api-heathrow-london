<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
        if ($this->route('location') != null) {
            $id = $this->route('location')->id;
        }

        return [
            'name' =>     'required|unique:locations,name,' . $id,
            'post_code' => 'required|unique:locations,post_code,' . $id,
            'category_id' => 'required',
        ];
    }
}
