<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repository\UserRepositoryInterface;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    public function updateInfoById(UsersRequest $request){
        $data = $this->userRepository->updateInfoById($request);
        return response()->json($data, 200);
    }

    public function getUserInfoById(Request $request){
        return response()->json(['status' => true, 'data' => $request->get('userInfo')], 200);
    }
}
