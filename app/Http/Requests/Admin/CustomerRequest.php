<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        if ($this->route('customer') != null) {
            $id = $this->route('customer')->id;
        }
        return [
            'title' => 'required',
            'first_name' => 'required',
            'email'      => 'required|unique:users,email,' . $id,
            'password' => 'sometimes',
        ];
    }
}
