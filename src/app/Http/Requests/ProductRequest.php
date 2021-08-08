<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Http\Request;

class ProductRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        return [
            'prod_name'             => 'min:8',
            'sale_price'            => 'required|numeric|min:0',
            'store_id'              => 'required|string',
            'variants'              => 'required',
            'variants.*.name'       => 'required|min:8',
            'variants.*.price'      => 'required|numeric|min:0',
            'variants.*.quantity'   => 'required|numeric|min:1'
        ];
    }

    public function messages() {
        return [
            'required'  => 'The :attribute is required'
        ];
    }

    public function attributes()
    {
        return [
            'store_name'     => 'Store Name',
        ];
    }
}
