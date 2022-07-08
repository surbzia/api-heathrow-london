<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentTypeRequest extends FormRequest
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
        if ($this->route('payment') != null) {
            $id = $this->route('payment')->id;
        }

        return [
            'name' =>     'required|unique:payment_types,name,' . $id,
            'description' =>     'required|unique:payment_types,description,' . $id,
        ];
    }
}
