<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Http\Request;
class StoreRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $store_id = $request->id;
        switch ($request->getMethod()){
            case 'POST':{
                $rule = [
                    'store_name'     => 'required|min:8|unique:stores,store_name'
                ];
                break;
            }
            case 'PUT': {
                $rule = [
                    'store_name'     => 'required|min:8|unique:stores,store_name,'. $store_id,
                ];
                break;
            }
        }
        return $rule;
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
