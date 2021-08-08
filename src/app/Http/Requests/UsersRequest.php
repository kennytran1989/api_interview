<?php

namespace App\Http\Requests;
use App\Http\Requests\BaseRequest;
use Illuminate\Http\Request;

class UsersRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rule = [
            'full_name' => 'required',
        ];
        $user_id = $request->get('userInfo')['id'];
        switch ($request->getMethod()){
            case 'POST':{
                $rule = [
                    'full_name' => 'required',
                    'email'     => 'required|email|unique:users,email',
                    'password'  => 'required|min:6'
                ];
            }
            case 'PUT': {
                $rule = [
                    'full_name' => 'requiredIf:full_name,!=,null',
                    'email'     => 'required|email|unique:users,email,'. $user_id,
                    'password'  => 'min:6'
                ];
            }

        }
        return $rule;
    }

    public function messages() {
        return [
            'required'      => 'The :attribute is required',
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'Full Name',
            'email'     => 'Email',
            'password'  => 'Password'
        ];
    }
}
